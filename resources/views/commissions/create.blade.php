@extends('layouts.admin')

@section('title')
    Создание новой комиссии
@stop

@section('content')

    {!! Form::open(array('url' => 'admin/commissions','files'=>true)) !!}
    @include('commissions.form',['submitButtonText' => 'Создать'])
    {!! Form::close() !!}

@stop