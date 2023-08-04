<div class="table-responsive">
    <table class="table" id="ticketLogs-table">
        <thead>
        <tr>
            <th>Ticket</th>
        <th>User</th>
        <th>Origin</th>
        <th>Datetime</th>
        <th>Text</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($ticketLogs as $ticketLog)
            <tr>
                <td>{{ $ticketLog->ticket_id }}</td>
            <td>{{ $ticketLog->user->name }}</td>
            <td>{{ $ticketLog->origin }}</td>
            <td>{{ $ticketLog->datetime }}</td>
            <td>{{ $ticketLog->text }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['ticketLogs.destroy', $ticketLog->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('ticketLogs.show', [$ticketLog->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('ticketLogs.edit', [$ticketLog->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
