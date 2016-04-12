@inject('commission_roles', 'App\CommissionRole')

@extends('layouts.admin')

@section('title')
    Проведение комиссии <strong>{{$commission->title}}</strong>
@stop

@section('breadcrumb')
	<li><a href="/admin/">Главная</a></li>
	<li>Комиссии</li>
	<li><a href="/admin/commissions_conduct">Проведение</a></li>
	<li class="active">{{$commission->title}}</li>

@stop


@section('content')

<div id="panel-2" class="panel panel-default">
	<div class="panel-heading">
		<span class="title elipsis">
			<strong>ПРОВЕДЕНИЕ КОМИССИИ</strong> <!-- panel title -->
		</span>

		<!-- tabs nav -->
		<ul class="nav nav-tabs pull-right">
			<li class="active"><!-- TAB 1 -->
				<a href="#ttab1_nobg" data-toggle="tab">УЧАСТНИКИ</a>
			</li>
			<li ><!-- TAB 1 -->
				<a href="#ttab2_nobg" data-toggle="tab">МЕРОПРИЯТИЯ</a>
			</li>
		</ul>
		<!-- /tabs nav -->


	</div>

	<!-- panel content -->
	<div class="panel-body">

		<!-- tabs content -->
		<div class="tab-content transparent">

			<div id="ttab1_nobg" class="tab-pane "><!-- TAB 1 CONTENT -->

				<div>
					<h4>Всего участников: {{$commission->non_admin_users()->count()}}</h4>
					<table class="table table-striped table-hover table-bordered ">
						<thead>
							<tr>
								<th>Ф.И.О.</th>
								<th>Филиал</th>
								<th>Должность</th>
								<th class="col-md-1">Роль</th>
								<th class="col-md-2">Действия</th>
							</tr>
						</thead>
						<tbody>
							@foreach($commission->non_admin_users() as $user)
								<tr>
									<td>{{$user->full_name()}}</td>
									<td>{{$user->filial->name}}</td>
									<td>{{$user->job->name}}</td>
									<td>{{$commission_roles->find($user->pivot->role_id)->name}}</td>
									<td >
									    <button type="button" class="btn btn-primary btn-xs btn-block margin-left-0">Отчет</button>
									  	
										<div class="btn-group  btn-block">
									    	<button type="button" class="btn btn-info btn-xs btn-block dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Роль <i class="caret"></i></button>
									  		<ul class="dropdown-menu" role="menu">
									  			@foreach ($commission_roles->where('id','!=','1')->orderby('id','desc')->get() as $role)
												<li><a href="{{$commission->id}}/change_role/{{$user->id}}/{{$role->id}}">{{$role->name}}</a></li>
												@endforeach
									  		</ul>
										</div>
										
										<div class="btn-group  btn-block">
									    	<button type="button" class="btn btn-danger btn-xs btn-block dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Отклонить <span class="caret"></span></button>
									  		<ul class="dropdown-menu" role="menu">
												<li><a href="#">Отклонить</a></li>
												<li><a href="#">Отклонить и запретить</a></li>
									  		</ul>
										</div>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>

				</div>

			</div><!-- /TAB 1 CONTENT -->

			<div id="ttab2_nobg" class="tab-pane active"> <!-- TAB 2 CONTENT -->
				<div>
					@foreach($commission->commission_stages as $stage)
						<h4>{{$stage->title}} <a href="#" class="btn btn-xs btn-info pull-right">Отчет по этапу</a></h4>
						<table class="table table-striped table-hover table-bordered ">
							<thead>
								<tr>
									<th>Мероприятие</th>
									<th class="col-md-1">Тип</th>
									<th class="col-md-1">Участвовало</th>
									<th class="col-md-2">Действия</th>
								</tr>
							</thead>
							<tbody>
								@foreach($stage->events as $event)
									<tr>
										<td>{{$event->event_description()->title}}</td>
										<td>{{$event->event_description()->type}}</td>
										<td></td>
										<td></td>
									</tr>
								@endforeach
							</tbody>
						</table>
					@endforeach
				</div>
			</div><!-- /TAB 2 CONTENT -->

		</div>
		<!-- /tabs content -->

	</div>
	<!-- /panel content -->

</div>
@stop

@section('description')
	<div id="panel-3" class="panel panel-default">
		<div class="panel-heading">
			<span class="title elipsis">
				<strong>ПОСЛЕДНИЕ СОБЫТИЯ</strong> <!-- panel title -->
			</span>
		</div>

			<!-- panel content -->
			<div class="panel-body">

				<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 500px;">
						<ul class="list-unstyled list-hover slimscroll height-500" data-slimscroll-visible="true" style="overflow: hidden; width: auto; height: 500px;">
							@foreach($log_messages as $message)
								<li>
									{!! $message->label() !!}
									<em>{{$message->created_at->format("d.m.Y H:i:s")}}<br></em>
									<span class="margin-left-6">{{$message->text}}</span>
								</li>
							@endforeach
					</ul>
				<div class="slimScrollBar" style="width: 7px; position: absolute; top: 15px; opacity: 0.6; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 156.25px; background: rgb(51, 51, 51);"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: block; border-radius: 7px; opacity: 0.05; z-index: 90; right: 1px; background: rgb(234, 234, 234);">
					
				</div>
				</div>

			</div>
			<!-- /panel content -->

								<!-- panel footer -->
		<div class="panel-footer">

			<a href="#"><i class="fa fa-arrow-right text-muted"></i> Просмотр архива событий</a>

		</div>
								<!-- /panel footer -->
	</div>



@stop



