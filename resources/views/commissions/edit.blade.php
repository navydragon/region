@extends('layouts.admin')

@section('title')
    Редактирование комиссии {{ $commission->title }}
@stop

@section('breadcrumb')
	<li><a href="/admin/">Главная</a></li>
	<li><a href="/admin/commissions">Комиссии</a></li>
	<li class="active">{{ $commission->title}}</li>
	<li class="active">Редактирование</li>
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
			<div class="form-group">
			    <h5>Статус комиссии:</h5>

			    {!! Form::radio('status', '1', $commission->check_match(1,$commission->status)); !!} Планируется
			    {!! Form::radio('status', '2', $commission->check_match(2,$commission->status)); !!} Проводится
			    {!! Form::radio('status', '3', $commission->check_match(3,$commission->status)); !!} Завершена

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
				
				<li>Поле "Название" должно состоять из трех или более символов</li>
			</ul>
			Также, измените статус комиссии, если это необходимо:
			<ul>
				<li>Планируется (режим по умолчанию при создании)- комиссия не будет видна участникам </li>
				<li>Проводится - участники могут присоединяться к комиссии и участвовать в мероприятиях</li>
				<li>Завершена - комиссия завершена и более вносить изменения в нее участники не смогут</li>
			</ul>
			После внесения всех изменений, нажмите кнопку "Обновить"
		</div>
	</div>
@stop