@extends('layouts.admin')

@section('title')
	Редактирование ответа  (Вопрос: {{$answer->question->title}}) 
@stop

@section('content')
	<div class="panel panel-primary">
		<div class="panel-body">
			{!! Form::model($answer, ['method' => 'PATCH','url' => '/admin/answers/' . $answer->id]) !!}
				<div class="form-group">
						{!! Form::label('body', 'Текст ответа:') !!}
						{!! Form::text('body',null,['class' => 'form-control']) !!}
				</div>
				<div class="form-group">
					Правильный ответ: 
					{!! Form::checkbox('right', null, $answer->right) !!}
				</div>
					<div class="form-group">
						{!! Form::submit('Обновить ответ', ['class' => 'btn btn-primary']) !!}
					</div>	
			{!! Form::close() !!}
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
			Для редактирования текста ответа: 
			<ul>
				<li>Измените поле "Текст ответа"</li>
				<li>Нажмите кнопку "Обновить ответ"</li>
			</ul>
		</div>
	</div>
@stop