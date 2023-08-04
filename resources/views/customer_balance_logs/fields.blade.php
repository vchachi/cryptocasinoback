<!-- Customer Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customer_id', 'Customer:') !!}
    {!! Form::select('customer_id', $customers, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User:') !!}
    {!! Form::select('user_id', $users, null, ['class' => 'form-control custom-select']) !!}
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

<!-- Awarded Tokens Field -->
<div class="form-group col-sm-6">
    {!! Form::label('awarded_tokens', 'Awarded Tokens:') !!}
    {!! Form::number('awarded_tokens', null, ['class' => 'form-control']) !!}
</div>

<!-- Taken Tokens Field -->
<div class="form-group col-sm-6">
    {!! Form::label('taken_tokens', 'Taken Tokens:') !!}
    {!! Form::number('taken_tokens', null, ['class' => 'form-control']) !!}
</div>

<!-- Reason Field -->
<div class="form-group col-sm-6">
    {!! Form::label('reason', 'Reason:') !!}
    {!! Form::text('reason', null, ['class' => 'form-control','minlength' => 3,'maxlength' => 255]) !!}
</div>