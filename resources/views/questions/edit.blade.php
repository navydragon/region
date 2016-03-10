@extends('layouts.admin')

@section('title')
	Редактирование вопроса "{{ $question->title }}"
@stop



@section('content')
	
	{!! Form::model($question, ['method' => 'PATCH','url' => '/admin/questions/' . $question->id]) !!}
	<div class="panel panel-primary">
		<div class="panel-body">
	   		<div class="form-group">
			    {!! Form::label('title', 'Текст вопроса:') !!}
			    {!! Form::text('title', null, ['class' => 'form-control col-md']) !!}
			</div>
			<div class="form-group">
				{!! Form::submit('Обновить текст вопроса', ['class' => 'btn btn-primary']) !!}
			</div>
	{!! Form::close() !!}
			<h4>Ответы:</h4>
			<ul class="list-group">
				@foreach($question->answers as $answer)
					{!! Form::open(array('url' => 'admin/answers/'.$answer->id.'','method' => 'DELETE')) !!}
						<li class="list-group-item">
							<div class="btn-group">
								<a href='/admin/answers/{{ $answer->id }}/edit' title="Редактировать" class="btn btn-default btn-sm"><span class="fa fa-lg fa-edit"></span></a>			 
								<button title="Удалить" class="btn btn-default btn-sm"><span class="fa fa-lg  fa-trash"></span></button>
							</div>
							<span>
								{{$answer->body}} @if ($answer->right==true) (правильный) @endif
							</span>
						</li>
					{!! Form::close() !!}
				@endforeach
			</ul>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">
			Добавить новый ответ
		</div>
		<div class="panel-body">
			{!! Form::open(array('url' => 'admin/questions/'.$question->id.'/answers/','method' => 'POST')) !!}
					<div class="form-group">
						{!! Form::label('body', 'Текст ответа:') !!}
						{!! Form::text('body',null,['class' => 'form-control']) !!}
					</div>
					<div class="form-group">
						Правильный ответ: 
						{!! Form::checkbox('right', null, false) !!}
					</div>
					<div class="form-group">
						{!! Form::submit('Добавить ответ', ['class' => 'btn btn-primary']) !!}
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
			Для редактирования текста вопроса: 
			<ul>
				<li>Измените поле "Текст вопроса"</li>
				<li>Нажмите кнопку "Обновить текст вопроса"</li>
			</ul>
			Для добавления нового ответа в вопрос:
			<ul>
				<li>В окне "Добавить новый ответ" заполните поле "Текст ответа"</li>
				<li>Если данный ответ является правильным, укажите это, установив соответствующий флажок</li>
				<li>Нажмите кнопку "Добавить ответ"</li>
				<li>На вопрос может быть один или несколько правильных ответов</li>
				<li>Обратите внимание, что если Вы не укажите хотя бы один ответ как правильный, любой ответ участника будет засчитан системой как ПРАВИЛЬНЫЙ</li>
			</ul>
			<ul>
				<li>Для редактирования ответа нажмите на кнопку <span class="fa fa-lg  fa-edit"></span></li>
				<li>Для удаления ответа нажмите на кнопку <span class="fa fa-lg  fa-trash"></span></li>
			</ul>
		</div>
	</div>
@stop