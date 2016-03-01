@extends('layouts.admin')

@section('title')
    Редактирование комиссии {{ $commission->title }}
@stop

@section('content')
    {!! Form::model($commission, ['method' => 'PATCH','url' => '/admin/commissions/' . $commission->id]) !!}
    	@include('commissions.form',['submitButtonText' => 'Обновить'])
    {!! Form::close() !!}

    @include('errors.list')


@stop