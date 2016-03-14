@extends('layouts.admin')

@section('title')
    Комиссии по проверке знаний требований охраны труда
@stop

@section('breadcrumb')
	<li><a href="/admin/">Главная</a></li>
	<li class="active">Комиссии</li>
@stop

@section('content')
	<div class="panel panel-primary">
		<div class="panel-heading">
			<span class="elipsis"><!-- panel title -->
				<strong>Доступные комиссии</strong>
			</span>
		</div>
		<div class="panel-body">
			<ul class="list-group">
				@foreach ($commissions as $commission)
						{!! Form::open(array('url' => 'admin/commissions/'.$commission->id.'','method' => 'DELETE')) !!}
							<li class="list-group-item">
										<div class="btn-group">
											<a href='/admin/commissions/{{ $commission->id }}/edit' title="Редактировать" class="btn btn-default btn-sm"><span class="fa fa-lg fa-edit"></span></a>
											<button title="Удалить" class="btn btn-default btn-sm"><span class="fa fa-lg  fa-trash"></span></button>
										</div>
										<span><a href="/admin/commissions/{{ $commission->id }}"><strong>{{ $commission->title }}</strong></a> ({{$commission->start_at->format("d.m.Y")}}-{{$commission->end_at->format("d.m.Y")}}) (Этапов: {{  $commission->commission_stages->count() }}, Файлов: {{ $commission->find_in_file_binds()->count() }}) Статус: <strong>{{ $commission->get_status_name() }}</strong> </span>
										<span class="pull-right">Организатор: {{$commission->user->name}}</span>
							</li>
						{!! Form::close() !!}
				@endforeach
			</ul>
		</div>
		<div class="panel-footer">
			<a class="btn btn-primary" href="/admin/commissions/create">Создать</a>
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
			<p>На данном экране отображается список комиссий по проверке знаний требований охраны труда, созданный Вами.</p>
			<ul>
				<li>Для создания новой комиссии нажмите кнопку "Создать"</li>
				<li>Для редактирования имени и описания комиссии нажмите кнопку <span class="fa fa-lg fa-edit"></span></li>
				<li>Для удаления комиссии нажмите кнопку <span class="fa fa-lg  fa-trash"></span></li>
				<li>Для просмотра комиссии и добавления в нее этапов, файлов и мероприятий щелкните по ее названию.</li>
			</ul>
		</div>
	</div>
@stop