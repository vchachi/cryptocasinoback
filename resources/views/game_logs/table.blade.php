<div class="table-responsive">
    <table class="table" id="gameLogs-table">
        <thead>
        <tr>
            <th>Game Detail</th>
        <th>Status</th>
        <th>Datetime</th>
        <th>Log</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($gameLogs as $gameLog)
            <tr>
                <td>{{ $gameLog->game_detail_id }}</td>
            <td>{{ $gameLog->status }}</td>
            <td>{{ $gameLog->datetime }}</td>
            <td>{{ $gameLog->log }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['gameLogs.destroy', $gameLog->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('gameLogs.show', [$gameLog->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('gameLogs.edit', [$gameLog->id]) }}"
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
