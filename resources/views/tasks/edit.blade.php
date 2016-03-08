@extends('layouts.admin')

@section('title')
	Редактирование задания "{{ $task->title }}"
@stop

@section('content')

	{!! Form::model($task, ['method' => 'PATCH','url' => '/admin/tasks/' . $task->id]) !!}
			@include('tasks.form',['submitButtonText' => 'Обновить'])
	{!! Form::close() !!}

	@include('errors.list')
@stop
