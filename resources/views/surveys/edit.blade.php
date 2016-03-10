@extends('layouts.admin')

@section('title')
	Редактирование анкеты "{{ $survey->title }}"
@stop

@section('content')
	
	{!! Form::model($survey, ['method' => 'PATCH','url' => '/admin/surveys/' . $survey->id]) !!}
	<div class="panel panel-primary">
		<div class="panel-body">
	   		<div class="form-group">
			    {!! Form::label('title', 'Имя анкеты:') !!}
			    {!! Form::text('title', null, ['class' => 'form-control']) !!}
			</div>
			<div class="form-group">
			    {!! Form::label('description', 'Описание анкеты:') !!}
			    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="panel-footer">
			{!! Form::submit('Обновить', ['class' => 'btn btn btn-primary']) !!}
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
			Для редактирования анкеты: 
			<ul>
				<li>Измените поля "Имя" и "Описание"</li>
				<li>Нажмите кнопку "Обновить"</li>
				<li>Поле "Имя" должно состоять из трех или более символов</li>
			</ul>
		</div>
	</div>
@stop