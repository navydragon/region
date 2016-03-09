@extends('layouts.admin')

@section('title')
	Редактирование ответа  (Вопрос: {{$answer->question->title}}) 
@stop

@section('content')
	<div class="row">
		<div class="col-md-6">
			{!! Form::model($answer, ['method' => 'PATCH','url' => '/admin/answers/' . $answer->id]) !!}
				<div class="form-group">
						{!! Form::label('body', 'Текст ответа:') !!}
						{!! Form::text('body',null,['class' => 'form-control']) !!}
				</div>
				<div class="form-group">
					Правильный ответ: 
					{!! Form::checkbox('right', null, $answer->right) !!}
				</div>
				<div class="col-md-4 nopadding">
				    {!! Form::submit('Обновить ответ', ['class' => 'btn btn-info form-control']) !!}
				</div>
			{!! Form::close() !!}
		</div>
	</div>

@stop