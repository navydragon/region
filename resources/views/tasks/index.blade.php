@extends('layouts.admin')

@section('title')
Задания
@stop

@section('content')


<div class="row">
	<div class="col-md-12">
		<h4>Доступные задания:</h4>
		<ul class="list-group">
		@foreach ($tasks as $task)
				{!! Form::open(array('url' => 'admin/tasks/'.$task->id.'','method' => 'DELETE')) !!}
					<li class="list-group-item">
								<div class="btn-group">
									<a href='/admin/tasks/{{ $task->id }}/edit' title="Редактировать" class="btn btn-default btn-sm"><span class="fa fa-lg fa-edit"></span></a>
									<button title="Удалить" class="btn btn-default btn-sm"><span class="fa fa-lg  fa-trash"></span></button>
								</div>
								<span><a href="/admin/tasks/{{ $task->id }}"><strong>{{ $task->title }}</strong></a> - {{$task->description}} </span>
								<span class="pull-right">Автор: {{$task->user->name}}</span>
					</li>
				{!! Form::close() !!}
		@endforeach
		</ul>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-md-6">	
		<a href="/admin/tasks/create"><button class="btn btn-info">Создать</button></a>
	</div>
</div>
@stop
