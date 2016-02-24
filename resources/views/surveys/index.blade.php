@extends('app')

@section('title')
Анкеты
@stop

@section('content')
	

	@foreach ($surveys as $survey)
		<h2><a href="/surveys/{{ $survey->id }}">{{ $survey->title }}</h2></a>
		<div class="body">
			{{$survey->description}}
		</div>
	@endforeach
@stop