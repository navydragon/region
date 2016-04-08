@extends('layouts.app')

@section('title')
<h4>Задание  <strong>"{{ $task->title}}"</strong></h4>
@stop

@section('content')
	<section>
		<div class="container">
			<h4>Описание:</h4>
			<p>{{ $task->description}}</p>
		</div>

		<div class="container">
			<h4>Файлы для скачивания:</h4>
			<ul class="list-group">
				@foreach($task->find_in_file_binds()->get() as $file_bind)
					<li class="list-group-item">
						<a href="#" target="_blank">{{$file_bind->file->title}}</a>
					</li>
				@endforeach
			</ul>
		</div>
	</section>
	<section>
		<div class="panel panel-default">
		<div class="panel-heading">
			<span class="elipsis"><!-- panel title -->
				<strong>Добавить файл к заданию</strong>
			</span>
		</div>
		<div class="panel-body">
				{!! Form::open(array('url' => 'admin/files/?type=user_task&id='.$task->id.'&commission='.$commission->id,'method' => 'POST','files'=>true)) !!}
					<div class="form-group">
						{!! Form::label('filename', 'Название файла:') !!}
						{!! Form::text('filename',null, ['class' => 'form-control']) !!}
						<br>
						{!! Form::file('file',null, ['class' => 'form-control']) !!}
					</div>
					<div class="form-group">
					    {!! Form::submit('Добавить файл', ['class' => 'btn btn-primary']) !!}
					</div>
				{!! Form::close() !!}
		</div>
	</div>
	</section>
	<section>
		<h4>Ранее подгруженные Вами файлы:</h4>
				<ul class="list-group">
				 @foreach (Auth::user()->file_binds('user_task')->type_id($task->id)->get() as $file_bind)
				 	{!! Form::open(array('url' => 'admin/files/'.$file_bind->file->id.'','method' => 'DELETE','class'=>'nomargin')) !!}
						<li class="list-group-item">
							<div class="btn-group">
								<button title="Удалить" class="btn btn-default btn-sm"><span class="fa fa-lg  fa-trash"></span></button>
							</div>
								<a href="/{{$file_bind->file->path}}" target="_blank">{{$file_bind->file->title}}</a> ({{$file_bind->file->type}})
						</li>
					{!! Form::close() !!}
				 @endforeach
				</ul>	
	</section>
@stop