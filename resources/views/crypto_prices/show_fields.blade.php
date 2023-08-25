<!-- Crypto Id Field -->
<div class="col-sm-12">
    {!! Form::label('crypto_id', 'Crypto:') !!}
    <p>{{ $cryptoPrice->crypto?->name }}</p>
</div>

<!-- Datetime Field -->
<div class="col-sm-12">
    {!! Form::label('datetime', 'Datetime:') !!}
    <p>{{ $cryptoPrice->datetime }}</p>
</div>

<!-- Value Field -->
<div class="col-sm-12">
    {!! Form::label('value', 'Value:') !!}
    <p>{{ $cryptoPrice->value }}</p>
</div>

