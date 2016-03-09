@extends('layouts.admin')

@section('title')
Анкеты
@stop

@section('content')
	<h4>Доступные анкеты:</h4>
	<ul class="list-group">
		@foreach ($surveys as $survey)
				{!! Form::open(array('url' => 'admin/surveys/'.$survey->id.'','method' => 'DELETE')) !!}
					<li class="list-group-item">
							<div class="btn-group">
								<a href='/admin/surveys/{{ $survey->id }}/edit' title="Редактировать" class="btn btn-default btn-sm"><span class="fa fa-lg fa-edit"></span></a>
								<button title="Удалить" class="btn btn-default btn-sm"><span class="fa fa-lg  fa-trash"></span></button>
							</div>
							<span><a href="/admin/surveys/{{ $survey->id }}"><strong>{{ $survey->title }}</strong></a> - {{$survey->description}} </span>
							<span class="pull-right">Автор: {{$survey->user->name}}</span>
					</li>
				{!! Form::close() !!}
		@endforeach
	</ul>


	<a class="btn btn-info" href="/admin/surveys/create">Создать</a>

@stop

