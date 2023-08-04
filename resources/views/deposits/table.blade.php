<div class="table-responsive">
    <table class="table" id="deposits-table">
        <thead>
        <tr>
            <th>Customer</th>
        <th>Datetime</th>
        <th>Crypto</th>
        <th>Value</th>
        <th>Status</th>
        <th>Verified</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($deposits as $deposit)
            <tr>
                <td>{{ $deposit->customer->name }}</td>
            <td>{{ $deposit->datetime }}</td>
            <td>{{ $deposit->crypto->name }}</td>
            <td>{{ $deposit->value }}</td>
            <td>{{ $deposit->status }}</td>
            <td>{{ $deposit->verified->name }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['deposits.destroy', $deposit->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('deposits.show', [$deposit->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('deposits.edit', [$deposit->id]) }}"
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
