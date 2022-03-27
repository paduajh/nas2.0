<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/permissions.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Guard Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('guard_name', __('models/permissions.fields.guard_name').':') !!}
    {!! Form::text('guard_name', 'web', ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'readonly' => true]) !!}
</div>
