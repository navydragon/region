@extends('layouts.admin')

@section('title')
Тестирования
@stop

@section('breadcrumb')
	<li><a href="/admin/">Главная</a></li>
	<li class="active">Мероприятия</li>
	<li class="active">Тестирования</li>
@stop

@section('content')
	<div class="panel panel-primary">
		<div class="panel-heading">
			<span class="elipsis"><!-- panel title -->
				<strong>Доступные тесты</strong>
			</span>
		</div>
		<div class="panel-body">
			<ul class="list-group">
				@foreach ($tests as $test)
						{!! Form::open(array('url' => 'admin/tests/'.$test->id.'','method' => 'DELETE')) !!}
							<li class="list-group-item">
										<div class="btn-group">
											<a href='/admin/tests/{{ $test->id }}/edit' title="Редактировать" class="btn btn-default btn-sm"><span class="fa fa-lg fa-edit"></span></a>
											<button title="Удалить" class="btn btn-default btn-sm"><span class="fa fa-lg  fa-trash"></span></button>
										</div>
										<span><a href="/admin/tests/{{ $test->id }}"><strong>{{ $test->title }}</strong></a> (Всего вопросов: {{$test->questions()->count()}}, Длительность: {{$test->duration}} мин.) </span>
										<span class="pull-right">Автор: {{$test->user->name}}</span>
							</li>
						{!! Form::close() !!}
				@endforeach
		</ul>
		</div>
		<div class="panel-footer">
			<a class="btn btn-primary" href="/admin/tests/create">Создать</a>
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
			<p><strong>Тестирование</strong> - тип мероприятия, в котором участник должен ответить на вопросы с одним или несколькими правильными ответами.</p>
			На панели отображен список доступных заданий: 
				<ul>
					<li>Для создания нового теста нажмите кнопку "Создать"</li>
					<li>Для редактирования имени и описания теста нажмите кнопку <span class="fa fa-lg fa-edit"></span></li>
					<li>Для удаления теста нажмите кнопку <span class="fa fa-lg  fa-trash"></span></li>
					<li>Для просмотра теста и добавления в него вопросов щелкните по названию теста</li>
				</ul>
		</div>
	</div>
@stop