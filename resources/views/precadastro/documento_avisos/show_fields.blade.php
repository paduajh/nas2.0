<!-- Nome Field -->
<div class="col-sm-12">
    {!! Form::label('nome', __('models/documentoAvisos.fields.nome').':') !!}
    <p>{{ $documentoAviso->nome }}</p>
</div>

<!-- Descricao Field -->
<div class="col-sm-12">
    {!! Form::label('descricao', __('models/documentoAvisos.fields.descricao').':') !!}
    <p>{{ $documentoAviso->descricao }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/documentoAvisos.fields.created_at').':') !!}
    <p>{{ $documentoAviso->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/documentoAvisos.fields.updated_at').':') !!}
    <p>{{ $documentoAviso->updated_at }}</p>
</div>

