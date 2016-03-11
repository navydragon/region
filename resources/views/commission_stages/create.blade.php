@extends('layouts.admin')

@section('title')
Добавление этапа к комиссии "{{ $commission->title }}"
@stop

@section('breadcrumb')
	<li><a href="/admin/">Главная</a></li>
	<li><a href="/admin/commissions">Комиссии</a></li>
	<li><a href="/admin/commissions/{{ $commission->id }}">{{ $commission->title}}</a></li>
	<li class="active">Новый этап</li>
@stop

@section('content')
	<div class="panel panel-primary">
		<div class="panel-heading">
			Добавить новый этап
		</div>
		<div class="panel-body">
					{!! Form::open(array('url' => 'admin/commissions/'.$commission->id.'/commission_stages','files'=>true)) !!}
						<div class="form-group">
							{!! Form::label('title', 'Название этапа:') !!}
						    {!! Form::text('title', null, ['class' => 'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('description', 'Описание этапа:') !!}
						    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
						</div>
						<div class="form-group col-md-6">
							{!! Form::label('start_at', 'Дата начала этапа:') !!}
						    {!! Form::input('date','start_at', null, ['class' => 'form-control']) !!}
						</div>
						<div class="form-group col-md-6">
							{!! Form::label('end_at', 'Дата конца этапа:') !!}
						    {!! Form::input('date','end_at', null, ['class' => 'form-control']) !!}
						</div>
						
						<div class="form-group" >
						    {!! Form::submit('Добавить этап', ['class' => 'btn btn-primary']) !!}
						</div>
					{!! Form::close() !!}

		</div>
	</div>
@stop

@section('description')
	<div class="panel panel-info">
		<div class="panel-heading">
			<span class="elipsis"><!-- panel title -->
				<strong>Пояснение</strong>
			</span>
		</div>
		<div class="panel-body">
			Для создания нового этапа комиссии: 
			<ul>
				<li>Заполните поля "Название","Описание", даты начала и окончания проведения этапа комиссии</li>
				<li>Нажмите кнопку "Создать"</li>
				<li>Поле "Название" должно состоять из трех или более символов</li>
			</ul>
		</div>
	</div>
@stop