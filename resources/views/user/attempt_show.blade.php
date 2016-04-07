@extends('layouts.app')

@section('title')
<h4>Просмотр попытки тестирования </h4>
@stop

@section('breadcrumbs')
<a href="{{ URL::previous()}}">Назад</a>
@stop



@section('content')
	<section>
		<div class="container">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="nomargin">Общая информация:</h4>
				</div>
				<div class="panel-body">
					<p class="nomargin"><strong>Тест: </strong><span>{{$xml->test}}</span></p>
					<p class="nomargin"><strong>Дата и время прохождения: </strong><span>{{$xml->datetime}}</span></p>
					<p class="nomargin"><strong>Результат, баллов: </strong>{{$xml->earned}}/{{$xml->total}}</p>
					<p class="nomargin"><strong>Результат, %: </strong>{{round($xml->earned/$xml->total * 100)}}%</p>
				</div>
			</div>
			
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="nomargin">Подробный результат: </h4>
				</div>
				<div class="panel-body">
			@foreach ($xml->questions->question as $q_name => $q_row)
				
				<?php 
                if ($q_row['type'] == 'single') {
                    $shape='circle';
                    $symbol='dot';
                } else {
                    $shape='square';
                    $symbol='check';
                }
                ?>

				<h5 class="margin-bottom-3"> 
				@if ($q_row['correct'] == 1)
					<i class="fa fa-check fa-border text-success"></i>
				@else
					<i class="fa fa-remove fa-border text-danger"></i>
				@endif
				{{$q_row}} 
				</h5>
					<ul class="list-group margin-left-20">
					@foreach($q_row->answers->answer as $a_name => $a_row)
						<li class="list-group-item padding-3 noborder">
						@if ($a_row['selected'] == 1)
							<i class="fa fa-{{$symbol}}-{{$shape}}-o {{$a_row['right'] == 1 ? "text-success":"text-danger"}}"></i>
						@else
							<i class="fa fa-{{$shape}}-o"></i> 
							{!! ($a_row['right'] == 1 && $view_right = true) ? "<i class=\"fa fa-check-".$shape."-o text-success\"></i>":"" !!}
						@endif
						{{$a_row}}</li>
					@endforeach
				
				</ul>
			@endforeach
			</div>
		</div>
		</div>
	<section>
@stop