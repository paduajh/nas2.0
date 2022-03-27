<!-- Tipo Field -->
<div class="col-sm-12">
    {!! Form::label('tipo', __('models/contas.fields.tipo').':') !!}
    <p>{{ $conta->tipo }}</p>
</div>

<!-- Descricao Field -->
<div class="col-sm-12">
    {!! Form::label('descricao', __('models/contas.fields.descricao').':') !!}
    <p>{{ $conta->descricao }}</p>
</div>

<!-- Branco Field -->
<div class="col-sm-12">
    {!! Form::label('branco', __('models/contas.fields.branco').':') !!}
    <p>{{ $conta->branco }}</p>
</div>

<!-- Agencia Field -->
<div class="col-sm-12">
    {!! Form::label('agencia', __('models/contas.fields.agencia').':') !!}
    <p>{{ $conta->agencia }}</p>
</div>

<!-- Conta Field -->
<div class="col-sm-12">
    {!! Form::label('conta', __('models/contas.fields.conta').':') !!}
    <p>{{ $conta->conta }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/contas.fields.created_at').':') !!}
    <p>{{ $conta->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/contas.fields.updated_at').':') !!}
    <p>{{ $conta->updated_at }}</p>
</div>

