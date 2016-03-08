@extends('layouts.admin')

@section('title')
    Создание новой анкеты
@stop

@section('content')

    {!! Form::open(array('url' => 'admin/tasks')) !!}
    @include('tasks.form',['submitButtonText' => 'Создать'])
    {!! Form::close() !!}

    @include('errors.list')


@stop