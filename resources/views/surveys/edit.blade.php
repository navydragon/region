@extends('app')

@section('title')
Редактирование анкеты "{{ $survey->title }}"
@stop

@section('content')

	{!! Form::model($survey, ['method' => 'PATCH','url' => 'surveys/' . $survey->id]) !!}
			@include('surveys.form',['submitButtonText' => 'Обновить'])
	{!! Form::close() !!}

	@include('errors.list')
@stop
