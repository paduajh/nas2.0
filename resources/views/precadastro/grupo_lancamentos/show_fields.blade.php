<!-- Nome Field -->
<div class="col-sm-12">
    {!! Form::label('nome', __('models/grupoLancamentos.fields.nome').':') !!}
    <p>{{ $grupoLancamento->nome }}</p>
</div>

<!-- Descricao Field -->
<div class="col-sm-12">
    {!! Form::label('descricao', __('models/grupoLancamentos.fields.descricao').':') !!}
    <p>{{ $grupoLancamento->descricao }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/grupoLancamentos.fields.created_at').':') !!}
    <p>{{ $grupoLancamento->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/grupoLancamentos.fields.updated_at').':') !!}
    <p>{{ $grupoLancamento->updated_at }}</p>
</div>

