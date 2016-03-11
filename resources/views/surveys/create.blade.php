@extends('layouts.admin')

@section('title')
    Создание новой анкеты
@stop

@section('breadcrumb')
	<li><a href="/admin/">Главная</a></li>
	<li class="active">Мероприятия</li>
	<li><a href="/admin/surveys">Анкеты</a></li>
	<li class="active">Новая</li>
@stop

@section('content')
	{!! Form::open(array('url' => 'admin/surveys')) !!}
	<div class="panel panel-primary">
		<div class="panel-body">
	   		<div class="form-group">
			    {!! Form::label('title', 'Имя анкеты:') !!}
			    {!! Form::text('title', null, ['class' => 'form-control']) !!}
			</div>
			<div class="form-group">
			    {!! Form::label('description', 'Описание анкеты:') !!}
			    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="panel-footer">
			{!! Form::submit('Создать', ['class' => 'btn btn btn-primary']) !!}
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
			Для создания новой анкеты: 
			<ul>
				<li>Заполните поля "Имя" и "Описание"</li>
				<li>Нажмите кнопку "Создать"</li>
				<li>Поле "Имя" должно состоять из трех или более символов</li>
			</ul>
		</div>
	</div>
@stop