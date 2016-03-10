@extends('layouts.admin')

@section('title')
    Создание нового теста
@stop




@section('content')

{!! Form::open(array('url' => 'admin/tests')) !!}
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
			    {!! Form::text('duration', '30', ['size' => '6']) !!}
			</div>
		</div>
			<div class="panel-footer">
				{!! Form::submit('Создать', ['class' => 'btn btn-primary']) !!}
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
			Для создания нового теста: 
			<ul>
				<li>Заполните поля "Имя" и "Описание"</li>
				<li>Измените длительность теста, если это необходимо</li>
				<li>Длительность - параметр, определяющий, сколько времени будет дано участнику на каждую попытку прохождения данного теста</li>
				<li>Нажмите кнопку "Создать"</li>
				<li>Поле "Имя" должно состоять из трех или более символов</li>
			</ul>
		</div>
	</div>
@stop