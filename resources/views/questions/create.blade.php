@extends('layouts.admin')

@section('title')
Добавление вопроса к тесту "{{ $test->title }}"
@stop

@section('content')
	<div class="row">
				<div class="col-md-6">

					{!! Form::open(array('url' => 'admin/tests/'.$test->id.'/questions')) !!}
						<div class="form-group">
							{!! Form::label('title', 'Текст вопроса:') !!}
						    {!! Form::textarea('title', null, ['class' => 'form-control']) !!}
						</div>
						
						<div class="form-group">
						    {!! Form::submit('Добавить вопрос', ['class' => 'btn btn-info form-control']) !!}
						</div>
					{!! Form::close() !!}

				</div>
			</div>
@stop

