<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','minlength' => 3,'maxlength' => 30]) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control','minlength' => 3,'maxlength' => 100]) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::text('status', null, ['class' => 'form-control','minlength' => 3,'maxlength' => 20]) !!}
</div>

<!-- Muted Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('muted', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('muted', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('muted', 'Muted', ['class' => 'form-check-label']) !!}
    </div>
</div>


<!-- Tokens Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tokens', 'Tokens:') !!}
    {!! Form::number('tokens', null, ['class' => 'form-control']) !!}
</div>