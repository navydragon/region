@extends('layouts.admin')

@section('title')
	Редактирование анкеты "{{ $survey->title }}"
@stop

@section('content')

	{!! Form::model($survey, ['method' => 'PATCH','url' => '/admin/surveys/' . $survey->id]) !!}
			@include('surveys.form',['submitButtonText' => 'Обновить'])
	{!! Form::close() !!}

@stop
