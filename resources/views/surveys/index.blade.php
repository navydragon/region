@extends('layouts.admin')

@section('title')
Анкеты
@stop

@section('breadcrumb')
	<li><a href="/admin/">Главная</a></li>
	<li class="active">Мероприятия</li>
	<li class="active">Анкеты</li>
@stop

@section('content')
	<div class="panel panel-primary">
		<div class="panel-heading">
			<span class="elipsis"><!-- panel title -->
				<strong>Доступные анкеты</strong>
			</span>
		</div>
		<div class="panel-body">
			<ul class="list-group">
				@foreach ($surveys as $survey)
						{!! Form::open(array('url' => 'admin/surveys/'.$survey->id.'','method' => 'DELETE')) !!}
							<li class="list-group-item">
									<div class="btn-group">
										<a href='/admin/surveys/{{ $survey->id }}/edit' title="Редактировать" class="btn btn-default btn-sm"><span class="fa fa-lg fa-edit"></span></a>
										<button title="Удалить" class="btn btn-default btn-sm"><span class="fa fa-lg  fa-trash"></span></button>
									</div>
									<span><a href="/admin/surveys/{{ $survey->id }}"><strong>{{ $survey->title }}</strong></a> (Вопросов: {{$survey->survey_questions->count()}}) </span>
									<span class="pull-right">Автор: {{$survey->user->name}}</span>
							</li>
						{!! Form::close() !!}
				@endforeach
			</ul>
		</div>
		<div class="panel-footer">
			<a class="btn btn-primary" href="/admin/surveys/create">Создать</a>
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
			<p><strong>Анкета</strong> - тип мероприятия, в процессе выполнения которого участник должен дать развернутый ответ (вписать) на поставленные вопросы. </p>
			На панели отображен список доступных анкет: 
			<ul>
				<li>Для создания новой анкеты нажмите кнопку "Создать"</li>
				<li>Для редактирования имени и описания анкеты нажмите кнопку <span class="fa fa-lg fa-edit"></span></li>
				<li>Для удаления анкеты нажмите кнопку <span class="fa fa-lg  fa-trash"></span></li>
				<li>Для просмотра анкеты и добавления в нее вопросов щелкните по названию анкеты</li>
			</ul>
		</div>
	</div>
@stop