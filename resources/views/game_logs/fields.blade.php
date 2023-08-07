<!-- Game Detail Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('game_detail_id', 'Game Detail:') !!}
    {!! Form::select('game_detail_id', $game_details, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::text('status', null, ['class' => 'form-control','minlength' => 3,'maxlength' => 20]) !!}
</div>

<!-- Datetime Field -->
<div class="form-group col-sm-6">
    {!! Form::label('datetime', 'Datetime:') !!}
    {!! Form::text('datetime', null, ['class' => 'form-control','id'=>'datetime']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#datetime').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Log Field -->
<div class="form-group col-sm-6">
    {!! Form::label('log', 'Log:') !!}
    {!! Form::text('log', null, ['class' => 'form-control']) !!}
</div>