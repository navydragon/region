@extends('layouts.admin')

@section('title')
Тестирования
@stop

@section('content')


<div class="row">
	<div class="col-md-12">
		<h4>Доступные тесты:</h4>
		<ul class="list-group">
		@foreach ($tests as $test)
				{!! Form::open(array('url' => 'admin/tests/'.$test->id.'','method' => 'DELETE')) !!}
					<li class="list-group-item">
								<div class="btn-group">
									<a href='/admin/tests/{{ $test->id }}/edit' title="Редактировать" class="btn btn-default btn-sm"><span class="fa fa-lg fa-edit"></span></a>
									<button title="Удалить" class="btn btn-default btn-sm"><span class="fa fa-lg  fa-trash"></span></button>
								</div>
								<span><a href="/admin/tests/{{ $test->id }}"><strong>{{ $test->title }}</strong></a> (Всего вопросов: {{$test->questions()->count()}}, Длительность: {{$test->duration}} мин.) </span>
								<span class="pull-right">Автор: {{$test->user->name}}</span>
					</li>
				{!! Form::close() !!}
		@endforeach
		</ul>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-md-6">	
		<a href="/admin/tests/create"><button class="btn btn-info">Создать</button></a>
	</div>
</div>
@stop
