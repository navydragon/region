@extends('layouts.admin')

@section('title')
Анкета "{{ $survey->title }}"
@stop

@section('content')
	<div class="panel panel-primary">
		<div class="panel-heading">
			<span class="elipsis"><!-- panel title -->
				<strong>{{ $survey->title }}</strong>
			</span>
		</div>
		<div class="panel-body">
			<h4>Описание:</h4>
			<p>{{ $survey->description }}</p>

			<h4>Вопросы анкеты:</h4>
			<ul class="list-group">
				@foreach ($survey->survey_questions as $survey_question)
					{!! Form::open(array('url' => 'admin/survey_questions/'.$survey_question->id.'','method' => 'DELETE')) !!}
						<li class="list-group-item">
							<div class="btn-group">
									<a href='/admin/survey_questions/{{ $survey_question->id }}/edit' title="Редактировать" class="btn btn-default btn-sm"><span class="fa fa-lg fa-edit"></span></a>
									 
										<button title="Удалить" class="btn btn-default btn-sm"><span class="fa fa-lg  fa-trash"></span></button>

							</div>
							<span>{{ $survey_question->body }}</span>
						</li>
					{!! Form::close() !!}
				@endforeach
			</ul>
		</div>
	</div>
			
	<div class="panel panel-default">
		<div class="panel-heading">
			<span class="elipsis"><!-- panel title -->
				<strong>Добавить новый вопрос</strong>
			</span>
		</div>
		<div class="panel-body">
				{!! Form::open(array('url' => 'admin/surveys/'.$survey->id.'/survey_questions')) !!}
					<div class="form-group">
						{!! Form::label('body', 'Текст вопроса анкеты:') !!}
					    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
					</div>
					<div class="form-group">
					    {!! Form::submit('Добавить', ['class' => 'btn btn-primary']) !!}
					</div>
				{!! Form::close() !!}
		</div>
	</div>


			
			<hr>
			<div class="row">
				<div class="col-md-6">
					

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
			Просмотр анкеты и добавление вопросов: 
			<ul>
				<li>Для добавления вопроса в анкету введите текст вопроса в соответствующее поле и нажмите кнопку "Добавить"</li>
				<li>Для редактирования вопроса нажмите кнопку <span class="fa fa-lg fa-edit"></span></li>
				<li>Для удаления вопроса нажмите кнопку <span class="fa fa-lg  fa-trash"></span></li>
			</ul>
		</div>
	</div>
@stop