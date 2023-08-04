<div class="table-responsive">
    <table class="table" id="gameTypes-table">
        <thead>
        <tr>
            <th>Name</th>
        <th>Status</th>
        <th>Details</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($gameTypes as $gameType)
            <tr>
                <td>{{ $gameType->name }}</td>
            <td>{{ $gameType->status }}</td>
            <td>{{ $gameType->details }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['gameTypes.destroy', $gameType->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('gameTypes.show', [$gameType->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('gameTypes.edit', [$gameType->id]) }}"
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
