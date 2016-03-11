@extends('layouts.admin')

@section('title')
Тест "{{ $test->title }}"
@stop

@section('breadcrumb')
	<li><a href="/admin/">Главная</a></li>
	<li class="active">Мероприятия</li>
	<li><a href="/admin/tests">Тестирования</a></li>
	<li class="active">{{ $test->title }}</li>
@stop


@section('content')
	<div class="panel panel-primary">
		<div class="panel-heading">
			<span class="elipsis"><!-- panel title -->
				<strong>{{ $test->title }}</strong>
			</span>
		</div>
		<div class="panel-body">
			<h4>Описание:</h4>
			<p>{{ $test->description }}</p>

			<h4>Вопросы:</h4>
			<ul class="list-group">
				@foreach ($test->questions as $question)
					{!! Form::open(array('url' => 'admin/questions/'.$question->id.'','method' => 'DELETE')) !!}
								<li class="list-group-item">
									<div class="btn-group">
												<button title="Удалить" class="btn btn-default btn-sm"><span class="fa fa-lg  fa-trash"></span></button>
									</div>
									<span><a href="/admin/tests/{{$test->id}}/questions/{{$question->id}}"><strong>{{ $question->title }}</strong></a></span>
								</li>
							{!! Form::close() !!}
				@endforeach
			</ul>	
		</div>
		<div class="panel-footer">
			<a href='/admin/tests/{{ $test->id }}/questions/create'class="btn btn-primary">Добавить вопрос</a>
		</div>
	</div>


@stop

@section('description')
	<div class="panel panel-info">
		<div class="panel-heading">
			<span class="elipsis"><!-- panel title -->
				<strong>Пояснение</strong>
			</span>
		</div>
		<div class="panel-body">
			Просмотр теста и добавление вопросов: 
			<ul>
				<li>Для добавления вопроса в тест нажмите кнопку "Добавить вопрос"</li>
				<li>Для редактирования вопроса и добавления в него ответов щелкните по названию вопроса</li>
				<li>Для удаления файла нажмите кнопку <span class="fa fa-lg  fa-trash"></span></li>
			</ul>
		</div>
	</div>
@stop