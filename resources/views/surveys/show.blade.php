@extends('admin')

@section('title')
Анкета "{{ $survey->title }}"
@stop

@section('content')

			<h4>Описание:</h4>
			<p>{{ $survey->description }}</p>



			<h4>Вопросы анкеты:</h4>
			<ul class="list-group">
				@foreach ($survey->survey_questions as $survey_question)
					<li class="list-group-item"><span><a href='/admin/survey_questions/{{ $survey_question->id }}/edit'><i class="main-icon fa fa-edit"></i></a></span>&nbsp;<span><a><i class="main-icon fa fa-trash"></i></a></span>
					{{ $survey_question->body }}</li>
				@endforeach
			</ul>
			<hr>
			<div class="row">
				<div class="col-md-6">
					<h4>Добавить новый вопрос:</h4>

					{!! Form::open(array('url' => 'admin/surveys/'.$survey->id.'/survey_questions')) !!}
						<div class="form-group">
						    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
						</div>
						<div class="form-group">
						    {!! Form::submit('Добавить', ['class' => 'btn btn-info form-control']) !!}
						</div>
					{!! Form::close() !!}

					@include('errors.list')
				</div>
			</div>

@stop
