@extends('layouts.app')

@section('title')
<h4>Комиссия  <strong>"{{ $commission->title}}"</strong></h4>
@stop

@section('content')
	<section class="padding-xxs">
		<div class="container">
			<h5>Сроки проведения комиссии: {{$commission->start_at->format("d.m.Y")}} - {{$commission->end_at->format("d.m.Y")}}</h5>
			<h5>Этапов: {{$commission->commission_stages->count()}}</h5>
			<h5>Файлы:</h5>
			<ul class="list-group">
				@foreach($commission->find_in_file_binds()->get() as $file)
					<li class="list-group-item">  {{$file->file->title}} <a href="{{$file->file->path}}" target="_blank">Скачать</a></li>
				@endforeach
			</ul>
		</div>
	</section>
	<section class="padding-xxs">
		<ul class="process-steps nav nav-tabs nav-justified">
			<h4>Этапы комиссии:</h4>
			<? $stages= $commission->commission_stages; ?>
			@for ($i = 0; $i < $stages->count(); $i++)
  				@if ($i == 0) <li class="active"> @else <li> @endif
				<a href="#step{{$i+1}}" data-toggle="tab">{{$i+1}}</a>
				<h4>{{ $stages[$i]->title }}</h4>
				<span class="nopadding nomargin">( {{ $stages[$i]->start_at->format("d.m.Y") }} - {{ $stages[$i]->end_at->format("d.m.Y") }})</span>
				</li>
			@endfor
		</ul>
		
		<div class="tab-content">
			@for ($i = 0; $i < $stages->count(); $i++)
				@if ($i == 0)<div role="tabpanel" class="tab-pane active" id="step{{$i+1}}">
				@else 		 <div role="tabpanel" class="tab-pane" id="step{{$i+1}}">
				@endif
					<h4>{{$stages[$i]->title}}</h4>
					@if ($stages[$i]->start_at <= Carbon\Carbon::today())
						<strong>Описание этапа:</strong> <p>{{ $stages[$i]->description }}</p>
						<div class="table-responsive">
							<table class="table table-bordered table-striped">
								<thead>
									<tr>
										<th class="col-md-6"><i class="fa  pull-right hidden-xs"></i>Мероприятие</th>
										<th class="col-md-3"><i class="fa fa-info pull-right hidden-xs"></i>Тип мероприятия</th>
										<th class="col-md-3"><i class="glyphicon glyphicon-send pull-right hidden-xs"></i>Перейти к выполнению</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($stages[$i]->events as $event)
										<tr>
											<td>{{$event->event_description()->title}}</td>
											<td>{{$event->event_description()->type}}</td>
											<td><a href="commission/{{$commission->id}}{{$event->event_description()->sublink}}" class="btn btn-default btn-xs pull-right"><i class="fa fa-edit white"></i> Выполнить </a></td>
										</tr>
									@endforeach
									
									
								</tbody>
							</table>
						</div>	
					@else
					<p>Информация по этапу и мероприятиям будет доступна в день начала этапа.</p>
					@endif
				</div>
			@endfor
		</div>
	</section>
	
@stop