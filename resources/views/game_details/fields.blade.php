<!-- Game Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('game_type_id', 'Game Type:') !!}
    {!! Form::select('game_type_id', $game_types, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Customer Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customer_id', 'Customer:') !!}
    {!! Form::select('customer_id', $customers, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User:') !!}
    {!! Form::select('user_id', $users, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::text('status', null, ['class' => 'form-control','minlength' => 3,'maxlength' => 20]) !!}
</div>