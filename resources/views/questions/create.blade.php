@extends('layouts.admin')

@section('title')
Добавление вопроса к тесту "{{ $test->title }}"
@stop

@section('breadcrumb')
	<li><a href="/admin/">Главная</a></li>
	<li class="active">Мероприятия</li>
	<li><a href="/admin/tests">Тестирования</a></li>
	<li><a href="/admin/tests/{{$test->id}}">{{$test->title}}</a></li>
	<li class="active">Новый вопрос</li>
@stop


@section('content')

{!! Form::open(array('url' => 'admin/tests/'.$test->id.'/questions')) !!}
    <div class="panel panel-primary">
		<div class="panel-body">
	   		<div class="form-group">
				{!! Form::label('title', 'Текст вопроса:') !!}
			    {!! Form::textarea('title', null, ['class' => 'form-control']) !!}
			</div>
		</div>
			<div class="panel-footer">
				{!! Form::submit('Добавить вопрос', ['class' => 'btn btn-primary']) !!}
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
			Для добавления вопроса в тест: 
			<ul>
				<li>Заполните поле "Текст вопроса"</li>
				<li>Нажмите кнопку "Добавить вопрос"</li>
				<li>Поле "Текст вопроса" должно состоять из трех или более символов</li>
			</ul>
		</div>
	</div>
@stop