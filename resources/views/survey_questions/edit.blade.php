<?
	$survey = $survey_question->survey;
?>

@extends('layouts.admin')

@section('title')
Редактирование вопроса анкеты "{{ $survey_question->body }}"
@stop

@section('breadcrumb')
	<li><a href="/admin/">Главная</a></li>
	<li class="active">Мероприятия</li>
	<li><a href="/admin/surveys">Анкеты</a></li>
	<li><a href="/admin/surveys/{{$survey->id}}">{{$survey->title}}</a></li>
	<li class="active">Редактирование вопроса</li>
@stop

@section('content')
	
	{!! Form::model($survey_question, ['method' => 'PATCH','url' => '/admin/survey_questions/' . $survey_question->id]) !!}
	<div class="panel panel-primary">
		<div class="panel-body">
	   		<div class="form-group">
				{!! Form::label('body', 'Текст вопроса анкеты:') !!}
			    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
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
			Для редактирования текста вопроса анкеты: 
			<ul>
				<li>Измените поле "Текст вопроса анкеты"</li>
				<li>Нажмите кнопку "Обновить"</li>
				<li>Поле "Текст вопроса анкеты" должно состоять из трех или более символов</li>
			</ul>
		</div>
	</div>
@stop

