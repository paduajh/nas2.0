<!-- Tipo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo', __('models/contas.fields.tipo').':') !!}
    {!! Form::select('tipo', $tiposConta, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Descricao Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descricao', __('models/contas.fields.descricao').':') !!}
    {!! Form::text('descricao', null, ['class' => 'form-control']) !!}
</div>

<!-- Branco Field -->
<div class="form-group col-sm-6">
    {!! Form::label('branco', __('models/contas.fields.branco').':') !!}
    {!! Form::text('branco', null, ['class' => 'form-control']) !!}
</div>

<!-- Agencia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('agencia', __('models/contas.fields.agencia').':') !!}
    {!! Form::text('agencia', null, ['class' => 'form-control']) !!}
</div>

<!-- Conta Field -->
<div class="form-group col-sm-6">
    {!! Form::label('conta', __('models/contas.fields.conta').':') !!}
    {!! Form::text('conta', null, ['class' => 'form-control']) !!}
</div>
