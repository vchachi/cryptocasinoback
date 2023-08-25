<div class="table-responsive">
    <table class="table" id="depositTickets-table">
        <thead>
        <tr>
            <th>Ticket</th>
        <th>Deposit</th>
        <th>User</th>
        <th>Datetime</th>
        <th>Status</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($depositTickets as $depositTicket)
            <tr>
                <td>{{ $depositTicket->ticket_id }}</td>
            <td>{{ $depositTicket->deposit_id }}</td>
            <td>{{ $depositTicket->user?->name }}</td>
            <td>{{ $depositTicket->datetime }}</td>
            <td>{{ $depositTicket->status }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['depositTickets.destroy', $depositTicket->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('depositTickets.show', [$depositTicket->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('depositTickets.edit', [$depositTicket->id]) }}"
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
