<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="{{ isset($title) ? str_slug($title) :  'Permissões' }}">
        <h4 class="panel-title">
            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#dd-{{ isset($title) ? str_slug($title) :  'Permissões' }}" aria-expanded="{{ isset($closed) ? $closed : 'true' }}" aria-controls="dd-{{ isset($title) ? str_slug($title) :  'Permissões' }}">
                {{ $title or 'Sobrescrever permissões' }} {!! isset($user) ? '<span class="text-danger">(' . $user->getDirectPermissions()->count() . ')</span>' : '' !!}
            </a>
        </h4>
    </div>
    <div id="dd-{{ isset($title) ? str_slug($title) :  'Permissões' }}" class="panel-collapse collapse {{ isset($closed) ? $closed : 'in' }}" role="tabpanel" aria-labelledby="dd-{{ isset($title) ? str_slug($title) :  'Permissões' }}">
        <div class="panel-body">
            <div class="row">
                @foreach($permissions as $perm)
                    <?php
                        $per_found = null;

                        if( isset($role) ) {
                            $per_found = $role->hasPermissionTo($perm->name);
                        }

                        if( isset($user)) {
                            $per_found = $user->hasDirectPermission($perm->name);
                        }
                    ?>

                    <div class="col-md-3">
                        <div class="checkbox">
                            <label class="{{ str_contains($perm->name, 'delete') ? 'text-danger' : '' }}">
                                <input type="checkbox" name="permissions[]" value="{{$perm->name}}"> {{ $perm->name }}
                                {{-- {!! Form::checkbox("permissions[]", $perm->name, $per_found, isset($options) ? $options : []) !!}  --}}
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>