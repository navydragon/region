@extends('app')

@section('title')
Анкеты
@stop

@section('content')

	@foreach ($surveys as $survey)
		<h2>{{ $survey->title }}</h2>
		<div class="body">
			{{$survey->description}}
		</div>
	@endforeach
@stop