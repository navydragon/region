@extends('layouts.admin')

@section('title')
Редактирование вопроса анкеты "{{ $survey_question->body }}"
@stop

@section('content')

	{!! Form::model($survey_question, ['method' => 'PATCH','url' => '/admin/survey_questions/' . $survey_question->id]) !!}
			<div class="form-group">
				 {!! Form::label('body', 'Текст вопроса анкеты:') !!}
			    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
			</div>
			<div class="form-group">
			    {!! Form::submit('Обновить', ['class' => 'btn btn-info form-control']) !!}
			</div>
	{!! Form::close() !!}

	@include('errors.list')
@stop
