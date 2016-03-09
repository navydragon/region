@extends('layouts.admin')

@section('title')
Тест "{{ $test->title }}"
@stop

@section('content')

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
	<div class="row">
		<div class="col-md-6">
				<a href='/admin/tests/{{ $test->id }}/questions/create'class="btn btn-info">Добавить вопрос</a>
		</div>
	</div>
@stop