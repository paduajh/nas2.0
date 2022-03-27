<!-- Nome Field -->
<div class="col-sm-12">
    {!! Form::label('nome', __('models/combustivels.fields.nome').':') !!}
    <p>{{ $combustivel->nome }}</p>
</div>

<!-- Descricao Field -->
<div class="col-sm-12">
    {!! Form::label('descricao', __('models/combustivels.fields.descricao').':') !!}
    <p>{{ $combustivel->descricao }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/combustivels.fields.created_at').':') !!}
    <p>{{ $combustivel->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/combustivels.fields.updated_at').':') !!}
    <p>{{ $combustivel->updated_at }}</p>
</div>

