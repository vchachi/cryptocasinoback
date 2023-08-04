<div class="table-responsive">
    <table class="table" id="depositTicketDetails-table">
        <thead>
        <tr>
            <th>Deposit Ticket</th>
        <th>User</th>
        <th>Datetime</th>
        <th>Text</th>
        <th>Status</th>
        <th>Confirmation Evidence</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($depositTicketDetails as $depositTicketDetail)
            <tr>
                <td>{{ $depositTicketDetail->deposit_ticket_id }}</td>
            <td>{{ $depositTicketDetail->user->name }}</td>
            <td>{{ $depositTicketDetail->datetime }}</td>
            <td>{{ $depositTicketDetail->text }}</td>
            <td>{{ $depositTicketDetail->status }}</td>
            <td>{{ $depositTicketDetail->confirmation_evidence }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['depositTicketDetails.destroy', $depositTicketDetail->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('depositTicketDetails.show', [$depositTicketDetail->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('depositTicketDetails.edit', [$depositTicketDetail->id]) }}"
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
