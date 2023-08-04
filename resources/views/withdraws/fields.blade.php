<!-- Customer Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customer_id', 'Customer Id:') !!}
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
    {!! Form::label('crypto_id', 'Crypto Id:') !!}
    {!! Form::select('crypto_id', $cryptos, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Value Field -->
<div class="form-group col-sm-6">
    {!! Form::label('value', 'Value:') !!}
    {!! Form::number('value', null, ['class' => 'form-control','min' => 0,'max' => 99999.99]) !!}
</div>

<!-- Tokens Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tokens', 'Tokens:') !!}
    {!! Form::number('tokens', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::text('status', null, ['class' => 'form-control','minlength' => 3,'maxlength' => 20]) !!}
</div>

<!-- Confirmed Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('confirmed_id', 'Confirmed Id:') !!}
    {!! Form::select('confirmed_id', $users, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Withdraw Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('withdraw_address', 'Withdraw Address:') !!}
    {!! Form::text('withdraw_address', null, ['class' => 'form-control','minlength' => 3,'maxlength' => 200]) !!}
</div>

<!-- Customer Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customer_name', 'Customer Name:') !!}
    {!! Form::text('customer_name', null, ['class' => 'form-control','minlength' => 3,'maxlength' => 30]) !!}
</div>