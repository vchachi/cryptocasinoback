<!-- Ticket Id Field -->
<div class="col-sm-12">
    {!! Form::label('ticket_id', 'Ticket:') !!}
    <p>{{ $depositTicket->ticket_id }}</p>
</div>

<!-- Deposit Id Field -->
<div class="col-sm-12">
    {!! Form::label('deposit_id', 'Deposit:') !!}
    <p>{{ $depositTicket->deposit_id }}</p>
</div>

<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'User:') !!}
    <p>{{ $depositTicket->user?->name }}</p>
</div>

<!-- Datetime Field -->
<div class="col-sm-12">
    {!! Form::label('datetime', 'Datetime:') !!}
    <p>{{ $depositTicket->datetime }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $depositTicket->status }}</p>
</div>

