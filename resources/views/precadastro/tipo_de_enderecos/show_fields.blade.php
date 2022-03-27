<!-- Nome Field -->
<div class="col-sm-12">
    {!! Form::label('nome', __('models/tipoDeEnderecos.fields.nome').':') !!}
    <p>{{ $tipoDeEndereco->nome }}</p>
</div>

<!-- Descricao Field -->
<div class="col-sm-12">
    {!! Form::label('descricao', __('models/tipoDeEnderecos.fields.descricao').':') !!}
    <p>{{ $tipoDeEndereco->descricao }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/tipoDeEnderecos.fields.created_at').':') !!}
    <p>{{ $tipoDeEndereco->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/tipoDeEnderecos.fields.updated_at').':') !!}
    <p>{{ $tipoDeEndereco->updated_at }}</p>
</div>

