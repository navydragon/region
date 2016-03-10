@extends('layouts.admin')

@section('title')
Добавление этапа к комиссии "{{ $commission->title }}"
@stop

@section('content')
	<div class="row">
				<div class="col-md-6">
					<h4>Добавить новый этап:</h4>

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
						
						<div class="form-group col-md-12" >
						    {!! Form::submit('Добавить этап', ['class' => 'btn btn-info form-control']) !!}
						</div>
					{!! Form::close() !!}

				</div>
			</div>
@stop