@extends('layouts.admin')

@section('title')
Анкеты
@stop

@section('content')


<div class="row">
	<div class="col-md-12">
		<h4>Доступные анкеты:</h4>
		<ul class="list-group">
		@foreach ($surveys as $survey)
				<li class="list-group-item">
					<div class="btn-group">
						<a href='/admin/surveys/{{ $survey->id }}/edit' title="Редактировать" class="btn btn-default btn-sm"><span class="fa fa-lg fa-edit"></span></a>
						<a href='#' title="Удалить" class="btn btn-default btn-sm"><span class="fa fa-lg  fa-trash"></span></a>
					</div>
					<span><a href="/admin/surveys/{{ $survey->id }}"><strong>{{ $survey->title }}</strong></a> - {{$survey->description}} </span>
					<span class="pull-right">Автор: {{$survey->user->name}}</span>
				</li>
		@endforeach
		</ul>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-md-6">	
		<a href="/admin/surveys/create"><button class="btn btn-info">Создать</button></a>
	</div>
</div>
@stop