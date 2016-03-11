<?php 
	$surveys = Auth::user()->surveys;
	$tasks = Auth::user()->tasks;
	$tests = Auth::user()->tests;
	$commission = $commission_stage->commission;
?>

@extends('layouts.admin')

@section('title')
Редактирование этапа "{{ $commission_stage->title }}" (Комиссия: "{{ $commission_stage->commission->title }}")
@stop

@section('breadcrumb')
	<li><a href="/admin/">Главная</a></li>
	<li><a href="/admin/commissions">Комиссии</a></li>
	<li><a href="/admin/commissions/{{ $commission->id }}">{{ $commission->title}}</a></li>
	<li class="active">Редактирование</li>
@stop

@section('content')

	 {!! Form::model($commission_stage, ['method' => 'PATCH','url' => '/admin/commission_stages/' . $commission_stage->id]) !!}
	<div class="panel panel-primary">
		<div class="panel-body">
			<div class="form-group">
				{!! Form::label('title', 'Название этапа:') !!}
			    {!! Form::text('title', null, ['class' => 'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('description', 'Описание этапа:') !!}
			    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
			</div>
			<div class="form-group col-md-6">
				{!! Form::label('start_at', 'Начало этапа:') !!}
			    {!! Form::input('date','start_at', $commission_stage->start_at->format('Y-m-d'), ['class' => 'form-control']) !!}

			</div>
			<div class="form-group col-md-6">
				{!! Form::label('end_at', 'Конец этапа:') !!}
			    {!! Form::input('date','end_at', $commission_stage->end_at->format('Y-m-d'), ['class' => 'form-control']) !!}
			</div>
	
		<h4 class="col-md-12">Управление мероприятиями этапа:</h4>
		<div class="col-md-4">
			<strong>Анкеты:</strong>
			<div class="form-group">
			<ul class="list-group">
				@foreach($surveys as $survey)
					<li class="list-group-item nopadding">
						{!! Form::checkbox('surveys['.$survey->id.']', $survey->id, $survey->find_in_stage($commission_stage->id)->count()) !!}
						{!! Form::label('sur'.$survey->id, $survey->title) !!}	
					</li>
				@endforeach
			</ul>
			</div>	
		</div>
		<div class="col-md-4">
			<strong>Задания:</strong>
			<div class="form-group">
			<ul class="list-group">
				@foreach($tasks as $task)
					<li class="list-group-item nopadding">
						{!! Form::checkbox('tasks['.$task->id.']', $task->id, $task->find_in_stage($commission_stage->id)->count()) !!}
						{!! Form::label('task'.$task->id, $task->title) !!}	
					</li>
				@endforeach
			</ul>
			</div>
		</div>
		<div class="col-md-4">
			<strong>Тесты:</strong>
			<div class="form-group">
			<ul class="list-group">
				@foreach($tests as $test)
					<li class="list-group-item nopadding">
						{!! Form::checkbox('tests['.$test->id.']', $test->id, $test->find_in_stage($commission_stage->id)->count()) !!}
						{!! Form::label('test'.$test->id, $test->title) !!}	
					</li>
				@endforeach
			</ul>
			</div>
		</div>
	<div class="form-group col-md-4" >
	    {!! Form::submit('Обновить', ['class' => 'btn btn-primary']) !!}
	</div>
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
			<ul>
				<li>Измените поля "Название", "Описание", даты начала и окончания этапа комиссии, если это необходимо</li>
				<li>Поле "Название" должно состоять из трех или более символов</li>
				<li>Добавьте мероприятия в этап, установив флажки напротив необходимых мероприятий</li>
				<li>Нажмите кнопку "Обновить"</li>
				
			</ul>
		</div>
	</div>
@stop