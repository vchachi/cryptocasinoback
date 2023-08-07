<!-- Game Detail Id Field -->
<div class="col-sm-12">
    {!! Form::label('game_detail_id', 'Game Detail:') !!}
    <p>{{ $gameLog->game_detail_id }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $gameLog->status }}</p>
</div>

<!-- Datetime Field -->
<div class="col-sm-12">
    {!! Form::label('datetime', 'Datetime:') !!}
    <p>{{ $gameLog->datetime }}</p>
</div>

<!-- Log Field -->
<div class="col-sm-12">
    {!! Form::label('log', 'Log:') !!}
    <p>{{ $gameLog->log }}</p>
</div>

