<div class="table-responsive">
    <table class="table" id="depositDetails-table">
        <thead>
        <tr>
            <th>Deposit</th>
        <th>Datetime</th>
        <th>User</th>
        <th>Value</th>
        <th>Tokens</th>
        <th>Status</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($depositDetails as $depositDetail)
            <tr>
                <td>{{ $depositDetail->deposit_id }}</td>
            <td>{{ $depositDetail->datetime }}</td>
            <td>{{ $depositDetail->user?->name }}</td>
            <td>{{ $depositDetail->value }}</td>
            <td>{{ $depositDetail->tokens }}</td>
            <td>{{ $depositDetail->status }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['depositDetails.destroy', $depositDetail->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('depositDetails.show', [$depositDetail->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('depositDetails.edit', [$depositDetail->id]) }}"
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
