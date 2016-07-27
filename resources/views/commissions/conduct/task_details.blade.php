@extends('layouts.admin')

@section('title')
<h4>Результаты мероприятия <strong>"{{ $event->event_description()->title}}"</strong>({{ $event->event_description()->type}})</h4>
@stop

@section('breadcrumb')
	<li><a href="/admin/">Главная</a></li>
	<li>Комиссии</li>
	<li><a href="/admin/commissions_conduct">Проведение</a></li>
	<li><a href="/admin/commissions_conduct/{{$commission->id}}">{{$commission->title}}</a></li>
	<li>Результаты мероприятия</li>
	<li class="active">{{ $event->event_description()->title}}</li>
@stop

@section('content')
	<div class="margin-bottom-5">
	<a target="_self" href="/admin/commissions_conduct/{{$commission->id}}/export/events/tests/{{$event->id}}" class="btn btn-primary">Экспорт в Word</a>
	</div>
	<table id="user" class="table table-bordered table-striped">
		<thead>
			<tr>
				<td>Ф.И.О.</td>
				<td>Участие </td>
				<td>Оценка</td>
				<td>Файлы</td>
			</tr>
		</thead>
		<tbody> 
			@foreach ($commission->common_users() as $user)
			<tr>         
				<td width="30%">{{$user->full_name()}}</td>
				<td width="10%">{{$event->stat_to_mark($user->id)}}</td>
				<td width="10%">
					<a href="#" class="mark" data-type="text" data-pk="{{$user->id}}" 
					data-url="/admin/commissions_conduct/{{$commission->id}}/marks/events/{{$event->id}}" 
					data-title="Введите оценку">{{$user->event_mark($event->id)}}</a>
				</td>
				<td width="50%">
						<div class="toggle">
		<label>Показать</label>
		<div class="toggle-content">
			@foreach ($user->file_binds('user_task')->type_id($event->type_id)->get() as $user_file)
			<p class="nomargin">{!! $user_file->file->thumbnail() !!} &nbsp;<a target="_blank" href="/{{ $user_file->file->path }}">{{ $user_file->file->title }}</a></p>
			@endforeach
		</div>
	</div>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

	
@stop


@section('page_script')
<script type="text/javascript">
	jQuery(window).load(function() { /** required .load **/
		loadScript(plugin_path + 'x-editable/dist/bootstrap3-editable/js/bootstrap-editable.min.js', function() {
			$(document).ready(
		    	function()
		    	{
			       //$.fn.editable.defaults._token = $("#_token").data("token");
			        $('.mark').editable({
			                validate: function(value) {
			                    if($.trim(value) == '')
			                        return 'Необходимо указать значение';
			                    var regCheck = new RegExp("^(0?[0-9]\d*(\.\d*[1-9]$)?|0?0\.\d*[0-9])$");
                    			if(!regCheck.test($.trim(value)))
                    				return 'Неверный ввод';
			                }
			        });
			    }
		    );
		});
	});

</script>
@stop

@section('description')

@stop