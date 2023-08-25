<!-- Customer Id Field -->
<div class="col-sm-12">
    {!! Form::label('customer_id', 'Customer:') !!}
    <p>{{ $withdraw->customer?->name }}</p>
</div>

<!-- Datetime Field -->
<div class="col-sm-12">
    {!! Form::label('datetime', 'Datetime:') !!}
    <p>{{ $withdraw->datetime }}</p>
</div>

<!-- Crypto Id Field -->
<div class="col-sm-12">
    {!! Form::label('crypto_id', 'Crypto:') !!}
    <p>{{ $withdraw->crypto?->name }}</p>
</div>

<!-- Value Field -->
<div class="col-sm-12">
    {!! Form::label('value', 'Value:') !!}
    <p>{{ $withdraw->value }}</p>
</div>

<!-- Tokens Field -->
<div class="col-sm-12">
    {!! Form::label('tokens', 'Tokens:') !!}
    <p>{{ $withdraw->tokens }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $withdraw->status }}</p>
</div>

<!-- Confirmed Id Field -->
<div class="col-sm-12">
    {!! Form::label('confirmed_id', 'Confirmed:') !!}
    <p>{{ $withdraw->confirmed?->name }}</p>
</div>

<!-- Withdraw Address Field -->
<div class="col-sm-12">
    {!! Form::label('withdraw_address', 'Withdraw Address:') !!}
    <p>{{ $withdraw->withdraw_address }}</p>
</div>

<!-- Customer Name Field -->
<div class="col-sm-12">
    {!! Form::label('customer_name', 'Customer Name:') !!}
    <p>{{ $withdraw->customer_name }}</p>
</div>

