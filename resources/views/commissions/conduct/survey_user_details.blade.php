@extends('layouts.empty')





@section('content')
	<section>
		<div class="col-md-12">
			<div style="margin-bottom:10px;">
				<a target="_self" href="#" class="btn btn-primary">Экспорт в Word</a>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="nomargin">Общая информация:</h4>
				</div>
				
				<div class="panel-body">
					<p class="nomargin"><strong>Пользователь: </strong><span>{{$user->full_name()}}</span></p>
					<p class="nomargin"><strong>Анкета: </strong><span>{{$survey->title}}</span></p>
				</div>
			</div>
			
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="nomargin">Результаты анкеты: </h4>
				</div>
				<div class="panel-body">
					@foreach ($survey->survey_questions as $question)
						<p class="margin-bottom-10"><strong>Вопрос: </strong>{{$question->body}}</p>
						<p class="margin-bottom-10"><strong>Ответ: </strong>{{$question->user_answer($user->id)}}</p>
						<hr>
					@endforeach
				</div>
			</div>
		</div>
	<section>
@stop