<div class="form-group">
    {!! Form::label('title', 'Название комиссии:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('description', 'Описание комиссии:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>
<h4>Добавить файл:</h4>
<div class="form-group">
	{!! Form::label('filename', 'Название файла:') !!}
	{!! Form::text('filename') !!}
	{!! Form::file('file') !!}
</div>
<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-info form-control']) !!}
</div>