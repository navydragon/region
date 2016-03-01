@extends('layouts.admin')

@section('title')
    Создание новой анкеты
@stop

@section('content')

    {!! Form::open(array('url' => 'admin/surveys')) !!}
    @include('surveys.form',['submitButtonText' => 'Создать'])
    {!! Form::close() !!}

    @include('errors.list')


@stop