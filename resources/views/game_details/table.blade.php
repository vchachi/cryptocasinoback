<div class="table-responsive">
    <table class="table" id="gameDetails-table">
        <thead>
        <tr>
            <th>Game Type</th>
        <th>Customer</th>
        <th>User</th>
        <th>Status</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($gameDetails as $gameDetail)
            <tr>
                <td>{{ $gameDetail->game_type?->name }}</td>
            <td>{{ $gameDetail->customer?->name }}</td>
            <td>{{ $gameDetail->user?->name }}</td>
            <td>{{ $gameDetail->status }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['gameDetails.destroy', $gameDetail->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('gameDetails.show', [$gameDetail->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('gameDetails.edit', [$gameDetail->id]) }}"
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
