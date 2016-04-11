@extends('layouts.admin')

@section('title')
    Проведение комиссиий по проверке знаний требований охраны труда
@stop

@section('breadcrumb')
	<li><a href="/admin/">Главная</a></li>
	<li>Комиссии</li>
	<li class="active">Проведение</li>

@stop


@section('content')
<div id="panel-2" class="panel panel-default">
								<div class="panel-heading">
									<span class="title elipsis">
										<strong>ПРОВЕДЕНИЕ КОМИССИЙ</strong> <!-- panel title -->
									</span>

									<!-- tabs nav -->
									<ul class="nav nav-tabs pull-right">
										<li class="active"><!-- TAB 1 -->
											<a href="#ttab1_nobg" data-toggle="tab">КОМИССИИ</a>
										</li>
									</ul>
									<!-- /tabs nav -->


								</div>

								<!-- panel content -->
								<div class="panel-body">

									<!-- tabs content -->
									<div class="tab-content transparent">

										<div id="ttab1_nobg" class="tab-pane active"><!-- TAB 1 CONTENT -->

											<div class="table-responsive">
												<table class="table table-striped table-hover table-bordered">
													<thead>
														<tr>
															<th>Название</th>
															<th>Статус</th>
															<th>Даты проведения</th>
															<th>Участников</th>
															<th>Экспертов</th>
															<th>Подробнее</th>
														</tr>
													</thead>
													<tbody>
														@foreach($commissions as $commission)
															<tr>
																<td>{{$commission->title}}</td>
																<td>{{$commission->get_status_name()}}</td>
																<td>{{$commission->start_at->format("d.m.Y")}}-{{$commission->end_at->format("d.m.Y")}}</td>
																<td>{{$commission->user_pivot()->where('role_id','=','2')->count()}}</td>
																<td>{{$commission->user_pivot()->where('role_id','=','3')->count()}}</td>
																<td><a href="/admin/commissions_conduct/{{$commission->id}}" class="btn btn-default btn-xs btn-block">Просмотр</a></td>
															</tr>
														@endforeach
													</tbody>
												</table>

											</div>

										</div><!-- /TAB 1 CONTENT -->



									</div>
									<!-- /tabs content -->

								</div>
								<!-- /panel content -->

</div>
	
@stop