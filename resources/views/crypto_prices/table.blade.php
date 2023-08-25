<div class="table-responsive">
    <table class="table" id="cryptoPrices-table">
        <thead>
        <tr>
            <th>Crypto</th>
        <th>Datetime</th>
        <th>Value</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cryptoPrices as $cryptoPrice)
            <tr>
                <td>{{ $cryptoPrice->crypto?->name }}</td>
            <td>{{ $cryptoPrice->datetime }}</td>
            <td>{{ $cryptoPrice->value }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['cryptoPrices.destroy', $cryptoPrice->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('cryptoPrices.show', [$cryptoPrice->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('cryptoPrices.edit', [$cryptoPrice->id]) }}"
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
