@extends('layouts.app')

@section('title')
<h4>Тест  <strong>"{{ $test->title}}"</strong></h4>
@stop

@section('content')
	<section>
		<div class="container">
			<h4>Описание:</h4>
			<p>{{ $test->description}}</p>
			<p>Время на тест: </p>
			<p>Количество вопросов:</p>
		</div>
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Начать тест</button>

	<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">

				<!-- header modal -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myLargeModalLabel">{{$test->title}}</h4>
				</div>

				<!-- body modal -->
				<div class="modal-body">
					<ul class="nav nav-tabs">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Вопрос <span class="caret"></span></a>
							<ul class="dropdown-menu">
								@foreach($test->questions as $question)
								<li><a href="#q{{$question->id}}" tabindex="-1" data-toggle="tab">{{$question->title}}</a></li>
								@endforeach
							</ul>
						</li>
					</ul>

					<div class="tab-content">
						@foreach($test->questions as $question)
							<div class="tab-pane fade" id="q{{$question->id}}">
								<h4>Вопрос: {{$question->title}} <span class="small">(Правильных ответов: {{$question->right_answers->count()}})</span></h4>
								@if ($question->right_answers->count()==1)

								@foreach ($question->answers as $answer)
									<label class="radio">
										<input type="radio" name="q{{$question->id}}" value="{{$answer->id}}">
										<i></i> {{$answer->body}}
									</label><br>
								@endforeach

								@else
								@foreach ($question->answers as $answer)
									<label class="checkbox">
										<input type="checkbox" name="q{{$question->id}}[{{$answer->id}}]" value="{{$answer->id}}">
										<i></i> {{$answer->body}}
									</label> <br>
								@endforeach
								@endif
							</div>
						@endforeach
					</div>
					<div>
						
						<ul class="pager">
						  <li class="previous"><a class="radius-0" href="#">&larr; Назад</a></li>
						  <li><a href="#" class="disabled">Отправить все</a></li>
						  <li class="next"><a class="radius-0" href="#">Далее &rarr;</a></li>
						</ul>
					</div>
				</div>

			</div>
		</div>
	</div>
	</section>
	<section>
		
	</section>
@stop