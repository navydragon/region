@extends('layouts.app')

@section('title')
<h4>Тест  <strong>"{{ $test->title}}"</strong></h4>
@stop

@section('content')
	<section>
		<div class="container">
			<h4>Описание:</h4>
			<p>{{ $test->description}}</p>
			<p>Количество вопросов:
			@if($test->question_count == 0)
				{{$test->questions()->count()}}
			@else
				{{$test->question_count}}
			@endif
			</p>
			<p>Время на тест: {{$test->duration}} мин. </p>
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
								<? $i=1; ?>
								@foreach($test->questions as $question)
								<li><a href="#q{{$i}}" tabindex="-1" data-toggle="tab" class="drop-link">{{$question->title}}</a></li>
								<? $i++; ?>	
								@endforeach
							</ul>
						</li>
					</ul>
				<form method="POST" name="test" id="test" action="">
				{!! Form::open(array('url' => '/commissions/{{$commission->id}}/tests/{{$test->id}}','method' => 'POST')) !!}
					<div class="tab-content">

						<? $i=1; ?>
						@foreach($test->questions as $question)
							<div class="tab-pane fade" id="q{{$i}}">
								<h4>{{$question->title}} <span class="small">(Правильных ответов: {{$question->right_answers->count()}})</span><span class="pull-right">Вопрос № {{$i}} из {{$test->questions()->count()}}</span></h4>
								@if ($question->right_answers->count()==1)

								@foreach ($question->answers as $answer)
									<label class="radio">
										<input type="radio" name="questions[{{$question->id}}]" value="{{$answer->id}}">
										<i></i> {{$answer->body}}
									</label><br>
								@endforeach

								@else
								@foreach ($question->answers as $answer)
									<label class="checkbox">
										<input type="checkbox" name="questions[{{$question->id}}][]" value="{{$answer->id}}">
										<i></i> {{$answer->body}}
									</label> <br>
								@endforeach
								@endif
							</div>
						<? $i++; ?>	
						@endforeach
					</div>
					<div>
						
						<ul class="pager">
						  <li class="previous"><a id="prev" class="btn radius-0 disabled" href="#" data-toggle="tab" tabindex="-1">&larr; Назад</a></li>
						  <li><a id="sendall" href="javascript:send_all();" class="btn">Отправить все</a></li>
						  <li class="next"><a id="next" class="btn radius-0" href="#" data-toggle="tab" tabindex="-1">Далее &rarr;</a></li>
						</ul>
					</div>
				{!! Form::close() !!}
				</div>
			
			</div>
		</div>
	</div>
	</section>

	@if ($attempts->count() > 0)
		<section>
			<h4>Предыдущие попытки:</h4>
			<table class="table table-bordered table-striped">
	        	<thead>
	            	<tr>
		                <th><i></i> Дата и время тестирования</th>
		                <th><i></i> Результат, баллов</th>
		                <th><i></i> Результат, %</th>
		                <th><i></i> Подробнее</th>
		            </tr>
	        	</thead>
	        	<tbody>
	        		@foreach($attempts->get() as $attempt)
	        			<tr>
	        				<td>{{date('d.m.Y H:i:s', strtotime($attempt->pivot->end_at))}}</td>
	        				<td>{{$attempt->pivot->earned}}/{{$attempt->pivot->total}}</td>
	        				<td>{{round($attempt->pivot->earned/$attempt->pivot->total * 100)}}%</td>
	        				<td><a class="btn btn-default btn-xs" href=""><i class="fa fa-eye"></i>Просмотр</a></td>
	        			</tr>
	        		@endforeach
	        	</tbody>
        	</table>
		</section>
	@endif
@stop





 <script type="text/javascript" src="/assets/front/plugins/jquery/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
var countChecked = function() {
  //var n = $( "input:checked" ).length;
  var disabler = 0;
  var n = $("input");
  for (var i = 0; i < n.length; i++) {
  	 ch = $( "input[name='"+n[i].name+"']:checked" ).length;

  	 if(ch==0) {disabler=1;}

  }
   if(disabler==0) {$( "#sendall" ).removeClass( "disabled" );}
};

 function disable_nav_buttons (cur)
 {
 	first_id = $("div.tab-pane").first().attr('id');
 	last_id = $("div.tab-pane").last().attr('id');
 	if (cur == last_id) {$("#next").addClass("disabled");}else{$("#next").removeClass("disabled");}
 	if (cur == first_id) {$("#prev").addClass("disabled");}else{$("#prev").removeClass("disabled");}
 }

 function send_all()
 {
 	$( "#test" ).submit();
 }

$(document).ready(function() { 
	$("div.tab-pane").first().addClass("in").addClass("active");
	var questions = $("div.tab-pane");
	tab_id=questions[0].id;
	//set_prev&next_ url
	$("#next").attr("href", "#"+tab_id);
	$("#prev").attr("href", "#"+tab_id);
	//check send_add
	$( "input[type=radio],input[type=checkbox]" ).click(function(event)
	{
	 countChecked();
	});

	$("a[data-toggle=tab]").click(function(event)
	{
		$("li.next").removeClass("active");
		$("li.previous").removeClass("active");
		arr = this.href.split('#q');
		if ($(this).attr('class')=="drop-link") 
		{				
			next_id = questions[parseInt(arr[1])-1].id;
			prev_id = questions[parseInt(arr[1])-1].id;
		}

		if ($(this).attr('id')=="next"){	next_id = questions[parseInt(arr[1])].id; prev_id = questions[parseInt(arr[1])].id;  }
		if ($(this).attr('id')=="prev"){	prev_id = questions[parseInt(arr[1])-2].id; next_id = questions[parseInt(arr[1])-2].id;	}

			$("#next").attr("href", "#"+next_id);
			$("#prev").attr("href", "#"+prev_id);
		disable_nav_buttons(next_id);
	});

	

});
</script>