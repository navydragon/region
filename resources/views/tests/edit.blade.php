@extends('layouts.admin')

@section('title')
	Редактирование теста "{{ $test->title }}"
@stop

@section('content')

	{!! Form::model($test, ['method' => 'PATCH','url' => '/admin/tests/' . $test->id]) !!}
			@include('tests.form',['submitButtonText' => 'Обновить'])
	{!! Form::close() !!}

@stop
