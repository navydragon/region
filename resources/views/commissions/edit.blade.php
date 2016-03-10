@extends('layouts.admin')

@section('title')
    Редактирование комиссии {{ $commission->title }}
@stop





@section('content')
	{!! Form::model($commission, ['method' => 'PATCH','url' => '/admin/commissions/' . $commission->id]) !!}
	<div class="panel panel-primary">
		<div class="panel-body">
			<div class="form-group">
			    {!! Form::label('title', 'Название комиссии:') !!}
			    {!! Form::text('title', null, ['class' => 'form-control']) !!}
			</div>
			<div class="form-group">
			    {!! Form::label('description', 'Описание комиссии:') !!}
			    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
			</div>
			<div class="form-group col-md-6">
				{!! Form::label('start_at', 'Дата начала комиссии:') !!}
			    {!! Form::input('date','start_at', $commission->start_at->format('Y-m-d'), ['class' => 'form-control']) !!}
			</div>
			<div class="form-group col-md-6">
				{!! Form::label('end_at', 'Дата конца комиссии:') !!}
			    {!! Form::input('date','end_at', $commission->end_at->format('Y-m-d'), ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="panel-footer">
			{!! Form::submit('Обновить', ['class' => 'btn btn btn-primary']) !!}
		</div>
	</div>
    {!! Form::close() !!}

@stop


@section('description')
	<div class="panel panel-info">
		<div class="panel-heading">
			<span class="elipsis"><!-- panel title -->
				<strong>Пояснение</strong>
			</span>
		</div>
		<div class="panel-body">
			<ul>
				<li>Измените поля "Название", "Описание", даты начала и окончания комиссии, если это необходимо</li>
				<li>Нажмите кнопку "Обновить"</li>
				<li>Поле "Название" должно состоять из трех или более символов</li>
			</ul>
		</div>
	</div>
@stop