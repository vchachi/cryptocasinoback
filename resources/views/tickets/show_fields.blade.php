<!-- Customer Id Field -->
<div class="col-sm-12">
    {!! Form::label('customer_id', 'Customer:') !!}
    <p>{{ $ticket->customer->name }}</p>
</div>

<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'User:') !!}
    <p>{{ $ticket->user->name }}</p>
</div>

<!-- Datetime Field -->
<div class="col-sm-12">
    {!! Form::label('datetime', 'Datetime:') !!}
    <p>{{ $ticket->datetime }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $ticket->status }}</p>
</div>

