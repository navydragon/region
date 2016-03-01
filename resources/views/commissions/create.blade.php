@extends('layouts.admin')

@section('title')
    Создание новой комиссии
@stop

@section('content')

    {!! Form::open(array('url' => 'admin/commissions')) !!}
    @include('commissions.form',['submitButtonText' => 'Создать'])
    {!! Form::close() !!}

    @include('errors.list')


@stop