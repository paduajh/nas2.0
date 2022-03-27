<!-- Nome Field -->
<div class="col-sm-12">
    {!! Form::label('nome', __('models/modelos.fields.nome').':') !!}
    <p>{{ $modelo->nome }}</p>
</div>

<!-- Descricao Field -->
<div class="col-sm-12">
    {!! Form::label('descricao', __('models/modelos.fields.descricao').':') !!}
    <p>{{ $modelo->descricao }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/modelos.fields.created_at').':') !!}
    <p>{{ $modelo->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/modelos.fields.updated_at').':') !!}
    <p>{{ $modelo->updated_at }}</p>
</div>

