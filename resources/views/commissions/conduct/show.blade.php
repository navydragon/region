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
								<th>Ф.И.О.</th>
								<th>Филиал</th>
								<th>Должность</th>
								<th>Роль</th>
								<th>Действия</th>
							</tr>
						</thead>
						<tbody>

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

@section('description')
<div id="panel-3" class="panel panel-default">
								<div class="panel-heading">
									<span class="title elipsis">
										<strong>ПОСЛЕДНИЕ СОБЫТИЯ</strong> <!-- panel title -->
									</span>
								</div>

								<!-- panel content -->
								<div class="panel-body">

									<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 300px;"><ul class="list-unstyled list-hover slimscroll height-300" data-slimscroll-visible="true" style="overflow: hidden; width: auto; height: 300px;">
										@foreach($log_messages as $message)
										<li>
											{!! $message->label() !!}
											<em>{{$message->created_at->format("d.m.Y H:i:s")}}<br></em>
											<span class="margin-left-6">{{$message->text}}</span>
										</li>
										@endforeach

									</ul><div class="slimScrollBar" style="width: 7px; position: absolute; top: 0px; opacity: 0.6; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 156.25px; background: rgb(51, 51, 51);"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: block; border-radius: 7px; opacity: 0.05; z-index: 90; right: 1px; background: rgb(234, 234, 234);"></div></div>

								</div>
								<!-- /panel content -->

								<!-- panel footer -->
								<div class="panel-footer">

									<a href="#"><i class="fa fa-arrow-right text-muted"></i> View Activities Archive</a>

								</div>
								<!-- /panel footer -->

							</div>
@stop