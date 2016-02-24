@extends('app')

@section('title')
Создание новой анкеты
@stop

@section('content')

	{!! Form::open(array('url' => 'surveys')) !!}
		@include('surveys.form',['submitButtonText' => 'Создать'])
	{!! Form::close() !!}

	@include('errors.list')


@stop