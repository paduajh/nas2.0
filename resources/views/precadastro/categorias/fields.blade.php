<!-- Nome Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nome', __('models/categorias.fields.nome').':') !!}
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
</div>

<!-- Descricao Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descricao', __('models/categorias.fields.descricao').':') !!}
    {!! Form::text('descricao', null, ['class' => 'form-control']) !!}
</div>