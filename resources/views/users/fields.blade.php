<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/users.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255]) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', __('models/users.fields.email').':') !!}
    {!! Form::email('email', null, ['class' => 'form-control','maxlength' => 255]) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('password', __('models/users.fields.password').':') !!}
    {!! Form::text('password', null, ['class' => 'form-control','maxlength' => 255]) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('password_confirmation', __('models/users.fields.password_confirm').':') !!}
    {!! Form::text('password_confirmation', null, ['class' => 'form-control','maxlength' => 255]) !!}
</div>

<div class="form-group col-sm-12">
{!! Form::label('perfis', 'Perfis:') !!}
{!! Form::select('roles[]', $roles,$rolesSelected?? null, ['id' => 'roles','multiple'=>true]) !!}
</div>

<div class="form-group col-sm-12">
{!! Form::label('permissions', 'Perfis:') !!}
{!! Form::select('permissions[]', $permissions,$permissionsSelected?? null, ['id' => 'permissions','multiple'=>true]) !!}
</div>

