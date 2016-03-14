@extends('layouts.admin')

@section('title')
Комиссия "{{ $commission->title }}"
@stop

@section('breadcrumb')
	<li><a href="/admin/">Главная</a></li>
	<li><a href="/admin/commissions">Комиссии</a></li>
	<li class="active">{{ $commission->title}}</li>
@stop

@section('content')
	
	<div class="panel panel-primary">
		<div class="panel-heading">
			<span class="elipsis"><!-- panel title -->
				<strong>{{ $commission->title }}</strong>
			</span>
		</div>
		<div class="panel-body">
			<h4>Описание:</h4>
			<p>{{ $commission->description }}</p>
			<h4>Статус</h4>
			<p><strong>{{ $commission->get_status_name() }}</strong></p>
			<h4>Даты проведения:</h4>
			<p>{{$commission->start_at->format("d.m.Y")}} - {{$commission->end_at->format("d.m.Y")}}</p>
			<h4>Этапы комиссии:</h4>
			<ul class="list-group">
				@foreach ($commission->commission_stages as $commission_stage)
					{!! Form::open(array('url' => 'admin/commission_stages/'.$commission_stage->id.'','method' => 'DELETE')) !!}
						<li class="list-group-item">
							<div class="btn-group">
									<a href='/admin/commission_stages/{{ $commission_stage->id }}/edit' title="Редактировать" class="btn btn-default btn-sm"><span class="fa fa-lg fa-edit"></span></a>
									 
										<button title="Удалить" class="btn btn-default btn-sm"><span class="fa fa-lg  fa-trash"></span></button>

							</div>
							<span><strong>{{ $commission_stage->title }}</strong>, ({{$commission_stage->start_at->format("d.m.Y")}}-{{$commission_stage->end_at->format("d.m.Y")}})  (Мероприятий: {{  $commission_stage->events->count() }} )
									
							</span>
						</li>
					{!! Form::close() !!}
				@endforeach
			</ul>
			<div class="form-group">
				<a href='/admin/commission_stages/create?commission={{ $commission->id }}'class="btn btn-primary">Добавить этап</a>
			</div>
		
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

	<div class="panel panel-default">
		<div class="panel-heading">
			Добавить файл к комисии
		</div>
		<div class="panel-body">
			{!! Form::open(array('url' => 'admin/files/?type=commission&id='.$commission->id,'method' => 'POST','files'=>true)) !!}
				<div class="form-group">
					{!! Form::label('filename', 'Название файла:') !!}
					{!! Form::text('filename',null, ['class' => 'form-control']) !!}
					<br>
					{!! Form::file('file',null, ['class' => 'form-control']) !!}
				</div>
				<div class="form-group">
				    {!! Form::submit('Добавить файл', ['class' => 'btn btn-primary']) !!}
				</div>
			{!! Form::close() !!}
		</div>
	</div>


@stop

@section('description')
	<div class="panel panel-info">
		<div class="panel-heading">
			<span class="elipsis"><!-- panel title -->
				<strong>Пояснение</strong>
			</span>
		</div>
		<div class="panel-body">
			Комиссия состоит из этапов (например, подготовительный и основной). Каждый этап, в свою очередь, включает в себя мероприятия для участников.
			<ul>
				<li>Для добавления этапа в комиссию нажмите кнопку "Добавить этап"</li>
				<li>Для редактирования этапа и добавления в него мероприятий нажмите кнопку <span class="fa fa-lg  fa-edit"></span></li>
				<li>Для удаления этапа нажмите кнопку <span class="fa fa-lg  fa-trash"></span></li>
			</ul>
			Файлы комиссии - это те файлы, которые будут видны ВСЕМ пользователям системы (даже тем, кто в комиссии не участвует) при просмотра описания комиссии. Таким файлом может быть, например, скан телеграммы о вызове участников на комиссию и тд.
			<ul>
				<li>Для добавления файла в задание введите название файла в соответствующее поле и нажмите кнопку "Добавить файл"</li>
				<li>Все добавленные файлы будут доступны всем пользователям системы для скачивания при просмотре описания комиссии</li>
				<li>Для удаления файла нажмите кнопку <span class="fa fa-lg  fa-trash"></span></li>
				
			</ul>
		</div>
	</div>
@stop