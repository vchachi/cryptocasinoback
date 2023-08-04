<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','minlength' => 3,'maxlength' => 30]) !!}
</div>

<!-- Current Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('current_price', 'Current Price:') !!}
    {!! Form::number('current_price', null, ['class' => 'form-control','min' => 0,'max' => 99999.99]) !!}
</div>

<!-- Active Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('active', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('active', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('active', 'Active', ['class' => 'form-check-label']) !!}
    </div>
</div>


<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', 'Type:') !!}
    {!! Form::text('type', null, ['class' => 'form-control','minlength' => 3,'maxlength' => 20]) !!}
</div>