@extends('layouts.admin')

@section('title')
Задание "{{ $task->title }}"
@stop

@section('content')

			<h4>Описание:</h4>
			<p>{{ $task->description }}</p>

<div class="row">
				<div class="col-md-6">
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

<div class="row">
				<div class="col-md-6">
				<h4>Добавить файл к заданию:</h4>
				{!! Form::open(array('url' => 'admin/files/?type=task&id='.$task->id,'method' => 'POST','files'=>true)) !!}
					<div class="form-group">
						{!! Form::label('filename', 'Название файла:') !!}
						{!! Form::text('filename') !!}
						{!! Form::file('file') !!}
					</div>
					<div class="form-group">
					    {!! Form::submit('Добавить файл', ['class' => 'btn btn-info']) !!}
					</div>
				{!! Form::close() !!}
				</div>
			</div>
@stop