<!-- Ticket Id Field -->
<div class="col-sm-12">
    {!! Form::label('ticket_id', 'Ticket:') !!}
    <p>{{ $withdrawTicket->ticket_id }}</p>
</div>

<!-- Withdraw Id Field -->
<div class="col-sm-12">
    {!! Form::label('withdraw_id', 'Withdraw:') !!}
    <p>{{ $withdrawTicket->withdraw_id }}</p>
</div>

<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'User:') !!}
    <p>{{ $withdrawTicket->user?->name }}</p>
</div>

<!-- Datetime Field -->
<div class="col-sm-12">
    {!! Form::label('datetime', 'Datetime:') !!}
    <p>{{ $withdrawTicket->datetime }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $withdrawTicket->status }}</p>
</div>

