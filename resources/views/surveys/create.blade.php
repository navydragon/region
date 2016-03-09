@extends('layouts.admin')

@section('title')
    Создание новой анкеты
@stop

@section('content')

    {!! Form::open(array('url' => 'admin/surveys')) !!}
    @include('surveys.form',['submitButtonText' => 'Создать'])
    {!! Form::close() !!}

@stop

@section('description')
	<div class="alert alert-info margin-bottom-30"><!-- INFO -->
		<strong>Пояснение:</strong> <br> Для создания новой анкеты: 
		<ul>
			<li>Заполните поля "Имя" и "Описание"</li>
			<li>Нажмите кнопку "Создать"</li>
			<li>Поле "Имя" должно состоять из трех или более символов</li>
		</ul>
	</div>
@stop