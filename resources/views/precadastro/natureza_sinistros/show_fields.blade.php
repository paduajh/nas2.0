<!-- Nome Field -->
<div class="col-sm-12">
    {!! Form::label('nome', __('models/naturezaSinistros.fields.nome').':') !!}
    <p>{{ $naturezaSinistro->nome }}</p>
</div>

<!-- Descricao Field -->
<div class="col-sm-12">
    {!! Form::label('descricao', __('models/naturezaSinistros.fields.descricao').':') !!}
    <p>{{ $naturezaSinistro->descricao }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/naturezaSinistros.fields.created_at').':') !!}
    <p>{{ $naturezaSinistro->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/naturezaSinistros.fields.updated_at').':') !!}
    <p>{{ $naturezaSinistro->updated_at }}</p>
</div>

