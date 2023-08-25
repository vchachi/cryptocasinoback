<div class="table-responsive">
    <table class="table" id="withdrawTickets-table">
        <thead>
        <tr>
            <th>Ticket</th>
        <th>Withdraw</th>
        <th>User</th>
        <th>Datetime</th>
        <th>Status</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($withdrawTickets as $withdrawTicket)
            <tr>
                <td>{{ $withdrawTicket->ticket_id }}</td>
            <td>{{ $withdrawTicket->withdraw_id }}</td>
            <td>{{ $withdrawTicket->user?->name }}</td>
            <td>{{ $withdrawTicket->datetime }}</td>
            <td>{{ $withdrawTicket->status }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['withdrawTickets.destroy', $withdrawTicket->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('withdrawTickets.show', [$withdrawTicket->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('withdrawTickets.edit', [$withdrawTicket->id]) }}"
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
