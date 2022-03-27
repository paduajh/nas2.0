<!-- Nome Field -->
<div class="col-sm-12">
    {!! Form::label('nome', __('models/tipoDeVeiculos.fields.nome').':') !!}
    <p>{{ $tipoDeVeiculo->nome }}</p>
</div>

<!-- Descricao Field -->
<div class="col-sm-12">
    {!! Form::label('descricao', __('models/tipoDeVeiculos.fields.descricao').':') !!}
    <p>{{ $tipoDeVeiculo->descricao }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/tipoDeVeiculos.fields.created_at').':') !!}
    <p>{{ $tipoDeVeiculo->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/tipoDeVeiculos.fields.updated_at').':') !!}
    <p>{{ $tipoDeVeiculo->updated_at }}</p>
</div>

