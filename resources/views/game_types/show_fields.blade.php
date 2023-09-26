<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $gameType->name }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $gameType->status }}</p>
</div>

<!-- Details Field -->
<div class="col-sm-12">
    {!! Form::label('details', 'Details:') !!}
    <p>{{ $gameType->details }}</p>
</div>

<!-- Settings Field -->
<div class="col-sm-12">
    {!! Form::label('settings', 'Settings:') !!}
    <p>{{ $gameType->settings }}</p>
</div>

