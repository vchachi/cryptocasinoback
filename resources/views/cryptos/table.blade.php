<div class="table-responsive">
    <table class="table" id="cryptos-table">
        <thead>
        <tr>
            <th>Name</th>
        <th>Current Price</th>
        <th>Active</th>
        <th>Type</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cryptos as $crypto)
            <tr>
                <td>{{ $crypto->name }}</td>
            <td>{{ $crypto->current_price }}</td>
            <td>{{ $crypto->active }}</td>
            <td>{{ $crypto->type }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['cryptos.destroy', $crypto->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('cryptos.show', [$crypto->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('cryptos.edit', [$crypto->id]) }}"
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
