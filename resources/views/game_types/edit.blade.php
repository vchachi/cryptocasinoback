@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Edit Game Type</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($gameType, ['route' => ['gameTypes.update', $gameType->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('game_types.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('gameTypes.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection

@section('third_party_scripts')
    @if (Auth::user()->isSuperAdmin())
        @include('game_types.scripts.schema-editor')
    @endif

    @if (Auth::user()->isAdmin())
        @include('game_types.scripts.settings-editor')
    @endif
@endsection