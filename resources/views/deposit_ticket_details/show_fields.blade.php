<!-- Ticket Id Field -->
<div class="col-sm-12">
    {!! Form::label('deposit_ticket_id', 'Deposit Ticket:') !!}
    <p>{{ $depositTicketDetail->deposit_ticket_id }}</p>
</div>

<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'User:') !!}
    <p>{{ $depositTicketDetail->user?->name }}</p>
</div>

<!-- Datetime Field -->
<div class="col-sm-12">
    {!! Form::label('datetime', 'Datetime:') !!}
    <p>{{ $depositTicketDetail->datetime }}</p>
</div>

<!-- Text Field -->
<div class="col-sm-12">
    {!! Form::label('text', 'Text:') !!}
    <p>{{ $depositTicketDetail->text }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $depositTicketDetail->status }}</p>
</div>

<!-- Confirmation Evidence Field -->
<div class="col-sm-12">
    {!! Form::label('confirmation_evidence', 'Confirmation Evidence:') !!}
    <p>{{ $depositTicketDetail->confirmation_evidence }}</p>
</div>

