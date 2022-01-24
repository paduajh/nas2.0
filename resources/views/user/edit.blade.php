@extends('adminlte::page')

@section('title', 'Usuários')


@section('content_header')
    <h1>ACL</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuários</a> </li>
        <li class="breadcrumb-item">Editar usuário</li>
    </ol>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('\bootstrap-duallistbox\dist\bootstrap-duallistbox.css')}}">
@endsection

@section('js')
    <script src="{{asset('\bootstrap-duallistbox\dist\jquery.bootstrap-duallistbox.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            let permissoes = $('select[name="permissions[]"]')
                                .bootstrapDualListbox({
                                    nonSelectedListLabel: 'Não selecionadas',
                                    selectedListLabel: 'Selecionadas',
                                    infoText: 'Mostrando todas as permissões ({0})',
                                    infoTextEmpty: "Sem permissões para mostrar",
                                    infoTextFiltered: '<span class="label label-warning">Filtradas</span> {0} de {1}',
                                    removeAllLabel: 'Remover todas',
                                    removeSelectedLabel: 'Remover Selecionadas',
                                    moveAllLabel: "Mover todas",
                                    moveSelectedLabel: "Mover selecionadas",
                                    filterPlaceHolder: "Filtrar",
                                    filterTextClear: "Mostrar todas"
                                });

            let customSettings = permissoes.bootstrapDualListbox('getContainer');
            customSettings.find('.moveall i').removeClass().addClass('fas fa-arrow-right');
            customSettings.find('.removeall i').removeClass().addClass('fas fa-arrow-left');

            let perfis = $('select[name="roles[]"]')
                                .bootstrapDualListbox({
                                    nonSelectedListLabel: 'Não selecionados',
                                    selectedListLabel: 'Selecionados',
                                    infoText: 'Mostrando todos os perfis ({0})',
                                    infoTextEmpty: "Sem perfis para mostrar",
                                    infoTextFiltered: '<span class="label label-warning">Filtrados</span> {0} de {1}',
                                    removeAllLabel: 'Remover todos',
                                    removeSelectedLabel: 'Remover Selecionados',
                                    moveAllLabel: "Mover todos",
                                    moveSelectedLabel: "Mover selecionados",
                                    filterPlaceHolder: "Filtrar",
                                    filterTextClear: "Mostrar todos"
                                });

            let customSettings1 = perfis.bootstrapDualListbox('getContainer');
            customSettings1.find('.moveall i').removeClass().addClass('fas fa-arrow-right');
            customSettings1.find('.removeall i').removeClass().addClass('fas fa-arrow-left');
        });
    </script>
@endsection

@section('content')    
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-5">
                    <h3>Editar usuário</h3>
                </div>
            </div>
            <div class="row">
                <div class="container">
                    <form action="{{route("users.update",$user->id)}}" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="row">
                            <div class="form-group @if ($errors->has('name')) has-error @endif">
                                <label for="name">Nome</label>
                                <input type="text" name="name" class="form-control" placeholder="Nome do usuário" value="{{old("name",$user->name)}}">
                                @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group @if ($errors->has('email')) has-error @endif">
                                <label for="email">Email</label>
                                <input type="text" name="email" class="form-control" placeholder="email" value="{{old("email",$user->email)}}">
                                @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
                            </div>
                        </div> 
                        <div class="row">
                            <div class="form-group">
                                <label for="name">
                                    Perfis
                                </label>
                                <select name="roles[]" id="perfis" multiple="true">
                                    @foreach ($roles as $role )
                                        <option value="{{$role->id}}"
                                            @if(collect(old('roles',$user->roles->pluck('id')->toArray()))->contains($role->id)) selected @endif
                                            >
                                            {{$role->name}}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('roles')) <p class="help-block">{{ $errors->first('roles') }}</p> @endif
                            </div>  
                        </div>
                        <hr>
                        <div class="row">
                            <div class="form-group">
                                <label for="name">
                                    Permissões
                                </label>
                                <select name="permissions[]" id="permissoes" multiple="true">
                                    @foreach ($permissions as $permissao )
                                        <option value="{{$permissao->id}}"
                                        @if(collect(old('permissions',$user->permissions->pluck('id')->toArray()))->contains($permissao->id)) selected @endif
                                        >
                                            {{$permissao->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>  
                        </div>
                        <div class="row">
                            <button type="submit" class="btn btn-primary">Atualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>  
    </div>
@endsection