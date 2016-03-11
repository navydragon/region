@extends('layouts.admin')

@section('title')
    Создание новой комиссии
@stop

@section('breadcrumb')
	<li><a href="/admin/">Главная</a></li>
	<li><a href="/admin/commissions">Комиссии</a></li>
	<li class="active">Новая</li>
@stop


@section('content')
	{!! Form::open(array('url' => 'admin/commissions','files'=>true)) !!}
	<div class="panel panel-primary">
		<div class="panel-body">
			<div class="form-group">
			    {!! Form::label('title', 'Название комиссии:') !!}
			    {!! Form::text('title', null, ['class' => 'form-control']) !!}
			</div>
			<div class="form-group">
			    {!! Form::label('description', 'Описание комиссии:') !!}
			    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
			</div>
			<div class="form-group col-md-6">
				{!! Form::label('start_at', 'Дата начала комиссии:') !!}
			    {!! Form::input('date','start_at', null, ['class' => 'form-control']) !!}
			</div>
			<div class="form-group col-md-6">
				{!! Form::label('end_at', 'Дата конца комиссии:') !!}
			    {!! Form::input('date','end_at', null, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="panel-footer">
			{!! Form::submit('Создать', ['class' => 'btn btn btn-primary']) !!}
		</div>
	</div>
    {!! Form::close() !!}

@stop


@section('description')
	<div class="panel panel-info">
		<div class="panel-heading">
			<span class="elipsis"><!-- panel title -->
				<strong>Пояснение</strong>
			</span>
		</div>
		<div class="panel-body">
			Для создания новой комиссии: 
			<ul>
				<li>Заполните поля "Название","Описание", даты начала и окончания проведения комиссии</li>
				<li>Нажмите кнопку "Создать"</li>
				<li>Поле "Название" должно состоять из трех или более символов</li>
			</ul>
		</div>
	</div>
@stop