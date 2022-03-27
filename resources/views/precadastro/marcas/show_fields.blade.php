<!-- Nome Field -->
<div class="col-sm-12">
    {!! Form::label('nome', __('models/marcas.fields.nome').':') !!}
    <p>{{ $marca->nome }}</p>
</div>

<!-- Descricao Field -->
<div class="col-sm-12">
    {!! Form::label('descricao', __('models/marcas.fields.descricao').':') !!}
    <p>{{ $marca->descricao }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/marcas.fields.created_at').':') !!}
    <p>{{ $marca->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/marcas.fields.updated_at').':') !!}
    <p>{{ $marca->updated_at }}</p>
</div>

