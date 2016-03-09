<div class="form-group">
    {!! Form::label('title', 'Имя теста:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('description', 'Описание теста:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('duration', 'Длительность теста (мин.):') !!}
    {!! Form::text('duration', '30', ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-info form-control']) !!}
</div>