<!-- Customer Id Field -->
<div class="col-sm-12">
    {!! Form::label('customer_id', 'Customer:') !!}
    <p>{{ $deposit->customer->name }}</p>
</div>

<!-- Datetime Field -->
<div class="col-sm-12">
    {!! Form::label('datetime', 'Datetime:') !!}
    <p>{{ $deposit->datetime }}</p>
</div>

<!-- Crypto Id Field -->
<div class="col-sm-12">
    {!! Form::label('crypto_id', 'Crypto:') !!}
    <p>{{ $deposit->crypto->name }}</p>
</div>

<!-- Value Field -->
<div class="col-sm-12">
    {!! Form::label('value', 'Value:') !!}
    <p>{{ $deposit->value }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $deposit->status }}</p>
</div>

<!-- Verified Id Field -->
<div class="col-sm-12">
    {!! Form::label('verified_id', 'Verified:') !!}
    <p>{{ $deposit->verified->name }}</p>
</div>

