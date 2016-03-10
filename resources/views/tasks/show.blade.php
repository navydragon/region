@extends('layouts.admin')

@section('title')
Задание "{{ $task->title }}"
@stop



@section('content')
	<div class="panel panel-primary">
		<div class="panel-heading">
			<span class="elipsis"><!-- panel title -->
				<strong>{{ $task->title }}</strong>
			</span>
		</div>
		<div class="panel-body">
			<h4>Описание:</h4>
			<p>{{ $task->description }}</p>

			<h4>Файлы задания:</h4>
				<ul class="list-group">
					@foreach($task->find_in_file_binds()->get() as $file_bind)
						{!! Form::open(array('url' => 'admin/files/'.$file_bind->file->id.'','method' => 'DELETE')) !!}
							<li class="list-group-item">
								<div class="btn-group">
									<button title="Удалить" class="btn btn-default btn-sm"><span class="fa fa-lg  fa-trash"></span></button>
								</div>
									{{$file_bind->file->title}}
							</li>
					@endforeach
				</ul>	
		</div>
	</div>
			
	<div class="panel panel-default">
		<div class="panel-heading">
			<span class="elipsis"><!-- panel title -->
				<strong>Добавить файл к заданию</strong>
			</span>
		</div>
		<div class="panel-body">
				{!! Form::open(array('url' => 'admin/files/?type=task&id='.$task->id,'method' => 'POST','files'=>true)) !!}
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


@stop

@section('description')
	<div class="panel panel-info">
		<div class="panel-heading">
			<span class="elipsis"><!-- panel title -->
				<strong>Пояснение</strong>
			</span>
		</div>
		<div class="panel-body">
			Просмотр задания и добавление файлов: 
			<ul>
				<li>Для добавления файла в задание введите название файла в соответствующее поле и нажмите кнопку "Добавить файл"</li>
				<li>Все добавленные файлы будут доступны участникам для скачивания во время выполнения задания</li>
				<li>Обычно в качестве файлов задания загружаются материалы, которые помогут участникам выполнить задание (методики, учебные материалы и тд.)</li>
				<li>Для удаления файла нажмите кнопку <span class="fa fa-lg  fa-trash"></span></li>
			</ul>
		</div>
	</div>
@stop