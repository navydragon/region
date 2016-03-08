<?php 
	$surveys = Auth::user()->surveys;
	$tasks = Auth::user()->tasks;
?>

@extends('layouts.admin')

@section('title')
Редактирование этапа "{{ $commission_stage->title }}" (Комиссия: "{{ $commission_stage->commission->title }}")
@stop

@section('content')

	 				{!! Form::model($commission_stage, ['method' => 'PATCH','url' => '/admin/commission_stages/' . $commission_stage->id]) !!}
						<div class="row">
							<div class="col-md-6">
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
								    {!! Form::input('date','start_at', null, ['class' => 'form-control']) !!}

								</div>
								<div class="form-group col-md-6">
									{!! Form::label('end_at', 'Конец этапа:') !!}
								    {!! Form::input('date','end_at', null, ['class' => 'form-control']) !!}
								</div>
							</div>
						</div>	
						<div class="row">
							<h4 class="col-md-12">Управление мероприятиями этапа:</h4>
							<div class="col-md-4">
								<strong>Анкеты:</strong>
								<div class="form-group">
								<ul class="list-group">
									@foreach($surveys as $survey)
										<li class="list-group-item nopadding">
											{!! Form::checkbox('surveys['.$survey->id.']', $survey->id, $survey->find_in_stage($commission_stage->id)) !!}
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
											{!! Form::checkbox('tasks['.$task->id.']', $task->id, $task->find_in_stage($commission_stage->id)) !!}
											{!! Form::label('task'.$task->id, $task->title) !!}	
										</li>
									@endforeach
								</ul>
								</div>
							</div>
							<div class="col-md-4">
								<strong>Тестирования:</strong>
							</div>
						</div>
						<div class="form-group col-md-4" >
						    {!! Form::submit('Обновить', ['class' => 'btn btn-info form-control']) !!}
						</div>
				{!! Form::close() !!}

	@include('errors.list')
@stop
