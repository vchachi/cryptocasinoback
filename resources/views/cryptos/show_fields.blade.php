<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $crypto->name }}</p>
</div>

<!-- Current Price Field -->
<div class="col-sm-12">
    {!! Form::label('current_price', 'Current Price:') !!}
    <p>{{ $crypto->current_price }}</p>
</div>

<!-- Active Field -->
<div class="col-sm-12">
    {!! Form::label('active', 'Active:') !!}
    <p>{{ $crypto->active }}</p>
</div>

<!-- Type Field -->
<div class="col-sm-12">
    {!! Form::label('type', 'Type:') !!}
    <p>{{ $crypto->type }}</p>
</div>

