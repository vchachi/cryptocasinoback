<!-- Game Id Field -->
<div class="col-sm-12">
    {!! Form::label('game_type_id', 'Game Type Id:') !!}
    <p>{{ $gameDetail->game_type_id }}</p>
</div>

<!-- Customer Id Field -->
<div class="col-sm-12">
    {!! Form::label('customer_id', 'Customer Id:') !!}
    <p>{{ $gameDetail->customer_id }}</p>
</div>

<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $gameDetail->user_id }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $gameDetail->status }}</p>
</div>

