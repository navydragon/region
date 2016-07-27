@extends('layouts.app')

@section('title')
<h4>Анкета  <strong>"{{ $survey->title}}"</strong></h4>
@stop

@section('content')
	<section>
		<div class="container">
			<h4>Описание:</h4>
			<p>{{ $survey->description}}</p>
		</div>
	</section>

	<section class="padding-xxs">
		<div class="container">
			<h4>Вопросы анкеты:</h4>
			{!! Form::open(array('url' => 'commissions/'.$commission->id.'/surveys/'.$survey->id.'','method' => 'POST')) !!}
			@foreach ($survey->survey_questions as $question)
			
				{!! Form::label('sq['.$question->id.']',$question->body) !!}
				
				{!! Form::textarea('sq['.$question->id.']',$question->user_answer(Auth::user()->id),['class' => 'form-control']) !!}
				<br>
			@endforeach
		</div>
			<input type="submit" class="btn btn-primary" value="Сохранить"/>
			{!! Form::close() !!}
	</section>	
@stop

