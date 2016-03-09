@extends('layouts.admin')

@section('title')
	Редактирование вопроса "{{ $question->title }}"
@stop

@section('content')
	<div class="row">
		<div class="col-md-12">
			{!! Form::model($question, ['method' => 'PATCH','url' => '/admin/questions/' . $question->id]) !!}
				<div class="form-group">
				    {!! Form::label('title', 'Текст вопроса:') !!}
				    	{!! Form::text('title', null, ['class' => 'form-control col-md']) !!}
				</div>
				
					<div class="col-md-4 nopadding">
						{!! Form::submit('Обновить текст вопроса', ['class' => 'btn btn-info form-control ']) !!}
					</div>
				
			{!! Form::close() !!}
		</div>	
	</div>
<p></p>
	<h4>Ответы:</h4>
	<div class="row">
		<div class="col-md-6">
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
<p></p>

	<h4>Добавить новый ответ:</h4>
	<div class="row">
		<div class="col-md-6">
				{!! Form::open(array('url' => 'admin/questions/'.$question->id.'/answers/','method' => 'POST')) !!}
					<div class="form-group">
						{!! Form::label('body', 'Текст ответа:') !!}
						{!! Form::text('body',null,['class' => 'form-control']) !!}
					</div>
					<div class="form-group">
						Правильный ответ: 
						{!! Form::checkbox('right', null, false) !!}
					</div>
					<div class="col-md-4 nopadding">
					    {!! Form::submit('Добавить ответ', ['class' => 'btn btn-info form-control']) !!}
					</div>
				{!! Form::close() !!}
		</div>		
	</div>

@stop
