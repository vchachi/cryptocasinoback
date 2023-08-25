<!-- Deposit Id Field -->
<div class="col-sm-12">
    {!! Form::label('deposit_id', 'Deposit:') !!}
    <p>{{ $depositDetail->deposit_id }}</p>
</div>

<!-- Datetime Field -->
<div class="col-sm-12">
    {!! Form::label('datetime', 'Datetime:') !!}
    <p>{{ $depositDetail->datetime }}</p>
</div>

<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'User:') !!}
    <p>{{ $depositDetail->user?->name }}</p>
</div>

<!-- Value Field -->
<div class="col-sm-12">
    {!! Form::label('value', 'Value:') !!}
    <p>{{ $depositDetail->value }}</p>
</div>

<!-- Tokens Field -->
<div class="col-sm-12">
    {!! Form::label('tokens', 'Tokens:') !!}
    <p>{{ $depositDetail->tokens }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $depositDetail->status }}</p>
</div>

