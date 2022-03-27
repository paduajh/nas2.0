<!-- Nome Field -->
<div class="col-sm-12">
    {!! Form::label('nome', __('models/tipoDeCarrocerias.fields.nome').':') !!}
    <p>{{ $tipoDeCarroceria->nome }}</p>
</div>

<!-- Descricao Field -->
<div class="col-sm-12">
    {!! Form::label('descricao', __('models/tipoDeCarrocerias.fields.descricao').':') !!}
    <p>{{ $tipoDeCarroceria->descricao }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/tipoDeCarrocerias.fields.created_at').':') !!}
    <p>{{ $tipoDeCarroceria->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/tipoDeCarrocerias.fields.updated_at').':') !!}
    <p>{{ $tipoDeCarroceria->updated_at }}</p>
</div>

