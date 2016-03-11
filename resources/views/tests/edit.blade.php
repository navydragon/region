@extends('layouts.admin')

@section('title')
	Редактирование теста "{{ $test->title }}"
@stop

@section('breadcrumb')
	<li><a href="/admin/">Главная</a></li>
	<li class="active">Мероприятия</li>
	<li><a href="/admin/tests">Тестирования</a></li>
	<li>{{$test->title}}</li>
@stop

@section('content')
	
	{!! Form::model($test, ['method' => 'PATCH','url' => '/admin/tests/' . $test->id]) !!}
	<div class="panel panel-primary">
		<div class="panel-body">
	   		<div class="form-group">
			    {!! Form::label('title', 'Имя теста:') !!}
			    {!! Form::text('title', null, ['class' => 'form-control']) !!}
			</div>
			<div class="form-group">
			    {!! Form::label('description', 'Описание теста:') !!}
			    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
			</div>
			<div class="form-group">
			    {!! Form::label('duration', 'Длительность теста (мин.):') !!}
			    {!! Form::text('duration', null, ['size' => '6']) !!}
			</div>
		</div>
		<div class="panel-footer">
			{!! Form::submit('Обновить', ['class' => 'btn btn-primary']) !!}
		</div>
	</div>
    {!! Form::close() !!}
@stop

@section('description')
	<div class="panel panel-info">
		<div class="panel-heading">
			<span class="elipsis"><!-- panel title -->
				<strong>Пояснение</strong>
			</span>
		</div>
		<div class="panel-body">
			Для редактирования задания: 
			<ul>
				<li>Измените поля "Имя","Описание", "Длительность"</li>
				<li>Нажмите кнопку "Обновить"</li>
				<li>Поле "Имя" должно состоять из трех или более символов</li>
			</ul>
		</div>
	</div>
@stop