<!-- Nome Field -->
<div class="col-sm-12">
    {!! Form::label('nome', __('models/formaPagamentos.fields.nome').':') !!}
    <p>{{ $formaPagamento->nome }}</p>
</div>

<!-- Descricao Field -->
<div class="col-sm-12">
    {!! Form::label('descricao', __('models/formaPagamentos.fields.descricao').':') !!}
    <p>{{ $formaPagamento->descricao }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/formaPagamentos.fields.created_at').':') !!}
    <p>{{ $formaPagamento->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/formaPagamentos.fields.updated_at').':') !!}
    <p>{{ $formaPagamento->updated_at }}</p>
</div>

