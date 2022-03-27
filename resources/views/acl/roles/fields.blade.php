<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/roles.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Guard Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('guard_name', __('models/roles.fields.guard_name').':') !!}
    {!! Form::text('guard_name', 'web', ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'readonly'=>true]) !!}
</div>

<div class="form-group col-sm-12">
{!! Form::label('permissions', 'Permissões:') !!}
{!! Form::select('permissoes[]', $permissoes,$permissionSelected?? null, ['id' => 'permissoes','multiple'=>true]) !!}
</div>
