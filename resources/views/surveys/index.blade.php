@extends('admin')

@section('title')
Анкеты
@stop

@section('content')


<div class="row">
	<div class="col-md-12">
		<h4>Доступные анкеты:</h4>
		<ul class="list-group">
		@foreach ($surveys as $survey)
			<li class="list-group-item"> <li class="list-group-item"><a href='/admin/surveys/{{ $survey->id }}/edit'><i class="main-icon fa fa-edit"></i></a>&nbsp;<a><i class="main-icon fa fa-trash"></i></a>   |   <span><a href="/admin/surveys/{{ $survey->id }}"><strong>{{ $survey->title }}</strong></a> - {{$survey->description}} </span> <span class="pull-right">Автор: {{$survey->user->name}}</span></li>
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