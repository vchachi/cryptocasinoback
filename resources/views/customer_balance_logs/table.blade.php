<div class="table-responsive">
    <table class="table" id="customerBalanceLogs-table">
        <thead>
        <tr>
            <th>Customer</th>
        <th>User</th>
        <th>Datetime</th>
        <th>Awarded Tokens</th>
        <th>Taken Tokens</th>
        <th>Reason</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($customerBalanceLogs as $customerBalanceLog)
            <tr>
                <td>{{ $customerBalanceLog->customer?->name }}</td>
            <td>{{ $customerBalanceLog->user?->name }}</td>
            <td>{{ $customerBalanceLog->datetime }}</td>
            <td>{{ $customerBalanceLog->awarded_tokens }}</td>
            <td>{{ $customerBalanceLog->taken_tokens }}</td>
            <td>{{ $customerBalanceLog->reason }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['customerBalanceLogs.destroy', $customerBalanceLog->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('customerBalanceLogs.show', [$customerBalanceLog->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('customerBalanceLogs.edit', [$customerBalanceLog->id]) }}"
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
