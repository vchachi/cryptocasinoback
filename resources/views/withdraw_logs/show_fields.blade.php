<!-- Withdraw Id Field -->
<div class="col-sm-12">
    {!! Form::label('withdraw_id', 'Withdraw:') !!}
    <p>{{ $withdrawLog->withdraw_id }}</p>
</div>

<!-- Datetime Field -->
<div class="col-sm-12">
    {!! Form::label('datetime', 'Datetime:') !!}
    <p>{{ $withdrawLog->datetime }}</p>
</div>

<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'User:') !!}
    <p>{{ $withdrawLog->user?->name }}</p>
</div>

<!-- Value Field -->
<div class="col-sm-12">
    {!! Form::label('value', 'Value:') !!}
    <p>{{ $withdrawLog->value }}</p>
</div>

<!-- Tokens Field -->
<div class="col-sm-12">
    {!! Form::label('tokens', 'Tokens:') !!}
    <p>{{ $withdrawLog->tokens }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $withdrawLog->status }}</p>
</div>

