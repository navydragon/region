@extends('app')

@section('title')
Анкета "{{ $survey->title }}"
@stop

@section('content')

	<article>
		{{ $survey->description }}
	</article>
@stop
