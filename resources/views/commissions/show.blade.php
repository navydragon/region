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
							<span><strong>{{ $commission_stage->title }}</strong>, ({{ $commission_stage->start_at }} - {{ $commission_stage->end_at }})  (Мероприятий: {{  $commission_stage->events->count() }} )
									
							</span>
						</li>
					{!! Form::close() !!}
				@endforeach
			</ul>
			<div class="row">
				<div class="col-md-6">
						<a href='/admin/commission_stages/create?commission={{ $commission->id }}'class="btn btn-info">Добавить этап</a>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-md-6">
					<h4>Файлы комиссии:</h4>
					<ul class="list-group">
						@foreach($commission->find_in_file_binds()->get() as $file_bind)
							{!! Form::open(array('url' => 'admin/files/'.$file_bind->file->id.'','method' => 'DELETE')) !!}
								<li class="list-group-item">
									<div class="btn-group">
										<button title="Удалить" class="btn btn-default btn-sm"><span class="fa fa-lg  fa-trash"></span></button>
									</div>
										{{$file_bind->file->title}}
								</li>
						@endforeach
					</ul>	
				</div>
			</div>	
			<div class="row">
				<div class="col-md-6">
				<h4>Добавить файл к комисии:</h4>
				{!! Form::open(array('url' => 'admin/files/?type=commission&id='.$commission->id,'method' => 'POST','files'=>true)) !!}
					<div class="form-group">
						{!! Form::label('filename', 'Название файла:') !!}
						{!! Form::text('filename') !!}
						{!! Form::file('file') !!}
					</div>
					<div class="form-group">
					    {!! Form::submit('Добавить файл', ['class' => 'btn btn-info']) !!}
					</div>
				{!! Form::close() !!}
				</div>
			</div>


@stop
