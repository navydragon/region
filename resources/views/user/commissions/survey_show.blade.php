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
			
				<h5>{{ $question->body }}</h5>
				<? $qq = Auth::user()->survey_questions_pivot->where('survey_question_id','=',$question->id); ?>
				<textarea name="sq[{{$question->id}}]" id="" rows="5" class="form-control" ></textarea>
				<br><br>
			@endforeach
		</div>
			<input type="submit" class="btn btn-primary" value="Сохранить"/>
			{!! Form::close() !!}
	</section>	
@stop