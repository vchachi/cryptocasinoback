<!-- Customer Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customer_id', 'Customer:') !!}
    {!! Form::select('customer_id', $customers, null, ['class' => 'form-control custom-select']) !!}
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

<!-- Crypto Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('crypto_id', 'Crypto:') !!}
    {!! Form::select('crypto_id', $cryptos, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Value Field -->
<div class="form-group col-sm-6">
    {!! Form::label('value', 'Value:') !!}
    {!! Form::number('value', null, ['class' => 'form-control','min' => 0,'max' => 99999.99]) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::text('status', null, ['class' => 'form-control','minlength' => 3,'maxlength' => 20]) !!}
</div>

<!-- Verified Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('verified_id', 'Verified:') !!}
    {!! Form::select('verified_id', $users, null, ['class' => 'form-control custom-select']) !!}
</div>
