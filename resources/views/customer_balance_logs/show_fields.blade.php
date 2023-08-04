<!-- Customer Id Field -->
<div class="col-sm-12">
    {!! Form::label('customer_id', 'Customer:') !!}
    <p>{{ $customerBalanceLog->customer->name }}</p>
</div>

<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'User:') !!}
    <p>{{ $customerBalanceLog->user->name }}</p>
</div>

<!-- Datetime Field -->
<div class="col-sm-12">
    {!! Form::label('datetime', 'Datetime:') !!}
    <p>{{ $customerBalanceLog->datetime }}</p>
</div>

<!-- Awarded Tokens Field -->
<div class="col-sm-12">
    {!! Form::label('awarded_tokens', 'Awarded Tokens:') !!}
    <p>{{ $customerBalanceLog->awarded_tokens }}</p>
</div>

<!-- Taken Tokens Field -->
<div class="col-sm-12">
    {!! Form::label('taken_tokens', 'Taken Tokens:') !!}
    <p>{{ $customerBalanceLog->taken_tokens }}</p>
</div>

<!-- Reason Field -->
<div class="col-sm-12">
    {!! Form::label('reason', 'Reason:') !!}
    <p>{{ $customerBalanceLog->reason }}</p>
</div>

