@extends('layouts.admin')

@section('title')
    Создание новой анкеты
@stop

@section('content')

    {!! Form::open(array('url' => 'admin/tests')) !!}
    @include('tests.form',['submitButtonText' => 'Создать'])
    {!! Form::close() !!}



@stop