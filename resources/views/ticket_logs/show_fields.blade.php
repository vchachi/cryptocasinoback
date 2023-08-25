<!-- Ticket Id Field -->
<div class="col-sm-12">
    {!! Form::label('ticket_id', 'Ticket:') !!}
    <p>{{ $ticketLog->ticket_id }}</p>
</div>

<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'User:') !!}
    <p>{{ $ticketLog->user?->name }}</p>
</div>

<!-- Origin Field -->
<div class="col-sm-12">
    {!! Form::label('origin', 'Origin:') !!}
    <p>{{ $ticketLog->origin }}</p>
</div>

<!-- Datetime Field -->
<div class="col-sm-12">
    {!! Form::label('datetime', 'Datetime:') !!}
    <p>{{ $ticketLog->datetime }}</p>
</div>

<!-- Text Field -->
<div class="col-sm-12">
    {!! Form::label('text', 'Text:') !!}
    <p>{{ $ticketLog->text }}</p>
</div>

