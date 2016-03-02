@extends('layouts.admin')

@section('title')
Комиссия "{{ $commission->title }}"
@stop

@section('content')

			<h4>Описание:</h4>
			<p>{{ $commission->description }}</p>



			<h4>Этапы комиссии:</h4>
			<ul class="list-group">
				@foreach ($commission->commission_stages as $commission_stage)
					{!! Form::open(array('url' => 'admin/commission_stages/'.$commission_stage->id.'','method' => 'DELETE')) !!}
						<li class="list-group-item">
							<div class="btn-group">
									<a href='/admin/commission_stages/{{ $commission_stage->id }}/edit' title="Редактировать" class="btn btn-default btn-sm"><span class="fa fa-lg fa-edit"></span></a>
									 
										<button title="Удалить" class="btn btn-default btn-sm"><span class="fa fa-lg  fa-trash"></span></button>

							</div>
							<span>{{ $commission_stage->title }} (Мероприятий: {{  $commission_stage->events->count() }})
									
							</span>
						</li>
					{!! Form::close() !!}
				@endforeach
			</ul>
			<hr>
			<div class="row">
				<div class="col-md-6">
					<h4>Добавить новый этап:</h4>

					{!! Form::open(array('url' => 'admin/commissions/'.$commission->id.'/commission_stages','files'=>true)) !!}
						<div class="form-group">
							{!! Form::label('title', 'Название этапа:') !!}
						    {!! Form::text('title', null, ['class' => 'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('description', 'Описание этапа:') !!}
						    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
						</div>
						<div class="form-group col-md-6">
							{!! Form::label('start_at', 'Начало этапа:') !!}
						    {!! Form::input('date','start_at', null, ['class' => 'form-control']) !!}
						</div>
						<div class="form-group col-md-6">
							{!! Form::label('end_at', 'Конец этапа:') !!}
						    {!! Form::input('date','end_at', null, ['class' => 'form-control']) !!}
						</div>
						<div class="form-group col-md-6	">
							{!! Form::label('file', 'Добавить файл:') !!}
							{!! Form::file('file') !!}
						</div>
						<div class="form-group col-md-12" >
						    {!! Form::submit('Добавить', ['class' => 'btn btn-info form-control']) !!}
						</div>
					{!! Form::close() !!}

				</div>
			</div>
			@include('errors.list')

@stop
