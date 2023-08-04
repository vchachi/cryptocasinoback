<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $customer->name }}</p>
</div>

<!-- Email Field -->
<div class="col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $customer->email }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $customer->status }}</p>
</div>

<!-- Muted Field -->
<div class="col-sm-12">
    {!! Form::label('muted', 'Muted:') !!}
    <p>{{ $customer->muted }}</p>
</div>

<!-- Tokens Field -->
<div class="col-sm-12">
    {!! Form::label('tokens', 'Tokens:') !!}
    <p>{{ $customer->tokens }}</p>
</div>

