<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','minlength' => 3,'maxlength' => 30]) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::text('status', null, ['class' => 'form-control','minlength' => 3,'maxlength' => 20]) !!}
</div>

<!-- Details Field -->
<div class="form-group col-sm-12">
    {!! Form::label('details', 'Details:') !!}
    {!! Form::text('details', null, ['class' => 'form-control','minlength' => 3,'maxlength' => 255]) !!}
</div>

@if (Auth::user()->isSuperAdmin())
    <!-- Schema Field -->
    <div class="form-group col-sm-6">
        <div id="schema-editor" class="custom-json-editor"></div>
        {!! Form::hidden('schema', null, [ 'id' => 'schema' ]) !!}
    </div>
@endif

<!-- Settings Field -->
<div class="form-group col-sm-6">
    @if (($gameType ?? false) && $gameType->schema)
        {!! Form::label('settings', 'Settings:') !!}
        <div id="settings-editor" class="custom-json-editor"></div>
        {!! Form::hidden('settings', null, [ 'id' => 'settings' ]) !!}
    @else
        {!! Form::label('nosettings', 'Settings:') !!}
        {!! Form::textarea('nosettings', 'Schema must be set', [ 'class' => 'form-control', 'disabled' => true ]) !!}
    @endif
</div>
