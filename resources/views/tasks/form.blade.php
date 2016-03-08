<div class="form-group">
    {!! Form::label('title', 'Имя задания:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('description', 'Описание задания:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-info form-control']) !!}
</div>