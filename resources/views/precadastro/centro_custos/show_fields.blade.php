<!-- Nome Field -->
<div class="col-sm-12">
    {!! Form::label('nome', __('models/centroCustos.fields.nome').':') !!}
    <p>{{ $centroCusto->nome }}</p>
</div>

<!-- Descricao Field -->
<div class="col-sm-12">
    {!! Form::label('descricao', __('models/centroCustos.fields.descricao').':') !!}
    <p>{{ $centroCusto->descricao }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/centroCustos.fields.created_at').':') !!}
    <p>{{ $centroCusto->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/centroCustos.fields.updated_at').':') !!}
    <p>{{ $centroCusto->updated_at }}</p>
</div>

