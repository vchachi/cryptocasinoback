<div class="table-responsive">
    <table class="table" id="withdrawLogs-table">
        <thead>
        <tr>
            <th>Withdraw</th>
        <th>Datetime</th>
        <th>User</th>
        <th>Value</th>
        <th>Tokens</th>
        <th>Status</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($withdrawLogs as $withdrawLog)
            <tr>
                <td>{{ $withdrawLog->withdraw_id }}</td>
            <td>{{ $withdrawLog->datetime }}</td>
            <td>{{ $withdrawLog->user->name }}</td>
            <td>{{ $withdrawLog->value }}</td>
            <td>{{ $withdrawLog->tokens }}</td>
            <td>{{ $withdrawLog->status }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['withdrawLogs.destroy', $withdrawLog->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('withdrawLogs.show', [$withdrawLog->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('withdrawLogs.edit', [$withdrawLog->id]) }}"
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
