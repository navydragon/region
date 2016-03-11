@extends('layouts.admin')

@section('title')
Задания
@stop

@section('breadcrumb')
	<li><a href="/admin/">Главная</a></li>
	<li class="active">Мероприятия</li>
	<li class="active">Задания</li>
@stop

@section('content')
	<div class="panel panel-primary">
		<div class="panel-heading">
			<span class="elipsis"><!-- panel title -->
				<strong>Доступные задания</strong>
			</span>
		</div>
		<div class="panel-body">
			<ul class="list-group">
				@foreach ($tasks as $task)
						{!! Form::open(array('url' => 'admin/tasks/'.$task->id.'','method' => 'DELETE')) !!}
							<li class="list-group-item">
								<div class="btn-group">
									<a href='/admin/tasks/{{ $task->id }}/edit' title="Редактировать" class="btn btn-default btn-sm"><span class="fa fa-lg fa-edit"></span></a>
									<button title="Удалить" class="btn btn-default btn-sm"><span class="fa fa-lg  fa-trash"></span></button>
								</div>
								<span><a href="/admin/tasks/{{ $task->id }}"><strong>{{ $task->title }}</strong></a> - {{$task->description}} </span>
								<span class="pull-right">Автор: {{$task->user->name}}</span>
							</li>
						{!! Form::close() !!}
				@endforeach
			</ul>
		</div>
		<div class="panel-footer">
			<a class="btn btn-primary" href="/admin/tasks/create">Создать</a>
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
			<p><strong>Задание</strong> - тип мероприятия, в процессе выполнения которого участник может загрузить в систему подготовленные им файлы (презентацию, проект, отчет и тд.)</p>
			На панели отображен список доступных заданий: 
				<ul>
					<li>Для создания нового задания нажмите кнопку "Создать"</li>
					<li>Для редактирования имени и описания задания нажмите кнопку <span class="fa fa-lg fa-edit"></span></li>
					<li>Для удаления задания нажмите кнопку <span class="fa fa-lg  fa-trash"></span></li>
					<li>Для просмотра задания и добавления в него вопросов щелкните по названию анкеты</li>
				</ul>
		</div>
	</div>
@stop