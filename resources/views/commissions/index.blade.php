@extends('layouts.admin')

@section('title')
    Комиссии по проверке знаний требований охраны труда
@stop

@section('content')
<div class="row">
	<div class="col-md-12">
		<h4>Доступные комиссии:</h4>
		<ul class="list-group">
		@foreach ($commissions as $commission)
				{!! Form::open(array('url' => 'admin/commissions/'.$commission->id.'','method' => 'DELETE')) !!}
					<li class="list-group-item">
								<div class="btn-group">
									<a href='/admin/commissions/{{ $commission->id }}/edit' title="Редактировать" class="btn btn-default btn-sm"><span class="fa fa-lg fa-edit"></span></a>
									<button title="Удалить" class="btn btn-default btn-sm"><span class="fa fa-lg  fa-trash"></span></button>
								</div>
								<span><a href="/admin/commissions/{{ $commission->id }}"><strong>{{ $commission->title }}</strong></a> (Этапов: {{  $commission->commission_stages->count() }}, Файлов: {{ $commission->find_in_file_binds()->count() }}) </span>
								<span class="pull-right">Организатор: {{$commission->user->name}}</span>
					</li>
				{!! Form::close() !!}
		@endforeach
		</ul>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-md-6">	
		<a href="/admin/commissions/create"><button class="btn btn-info">Создать</button></a>
	</div>
</div>

@stop