<div class="table-responsive">
    <table class="table" id="withdraws-table">
        <thead>
        <tr>
            <th>Customer</th>
        <th>Datetime</th>
        <th>Crypto</th>
        <th>Value</th>
        <th>Tokens</th>
        <th>Status</th>
        <th>Confirmed</th>
        <th>Withdraw Address</th>
        <th>Customer Name</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($withdraws as $withdraw)
            <tr>
                <td>{{ $withdraw->customer->name }}</td>
            <td>{{ $withdraw->datetime }}</td>
            <td>{{ $withdraw->crypto->name }}</td>
            <td>{{ $withdraw->value }}</td>
            <td>{{ $withdraw->tokens }}</td>
            <td>{{ $withdraw->status }}</td>
            <td>{{ $withdraw->confirmed->name }}</td>
            <td>{{ $withdraw->withdraw_address }}</td>
            <td>{{ $withdraw->customer_name }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['withdraws.destroy', $withdraw->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('withdraws.show', [$withdraw->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('withdraws.edit', [$withdraw->id]) }}"
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
