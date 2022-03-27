<!-- Nome Field -->
<div class="col-sm-12">
    {!! Form::label('nome', __('models/categorias.fields.nome').':') !!}
    <p>{{ $categoria->nome }}</p>
</div>

<!-- Descricao Field -->
<div class="col-sm-12">
    {!! Form::label('descricao', __('models/categorias.fields.descricao').':') !!}
    <p>{{ $categoria->descricao }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/categorias.fields.created_at').':') !!}
    <p>{{ $categoria->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/categorias.fields.updated_at').':') !!}
    <p>{{ $categoria->updated_at }}</p>
</div>

