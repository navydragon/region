@extends('layouts.admin')

@section('title')
	Редактирование задания "{{ $task->title }}"
@stop


@section('content')
	
	{!! Form::model($task, ['method' => 'PATCH','url' => '/admin/tasks/' . $task->id]) !!}
	<div class="panel panel-primary">
		<div class="panel-body">
	   		<div class="form-group">
			    {!! Form::label('title', 'Имя задания:') !!}
			    {!! Form::text('title', null, ['class' => 'form-control']) !!}
			</div>
			<div class="form-group">
			    {!! Form::label('description', 'Описание задания:') !!}
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
			Для редактирования задания: 
			<ul>
				<li>Измените поля "Имя" и "Описание"</li>
				<li>Нажмите кнопку "Обновить"</li>
				<li>Поле "Имя" должно состоять из трех или более символов</li>
				<li>Для добавления файлов в задание перейдите к просмотру задания, щелкнув по его имени в списке заданий.</li>
			</ul>
		</div>
	</div>
@stop