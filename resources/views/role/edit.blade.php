@extends('adminlte::page')

@section('title', 'Perfis & Permissões')

@section('css')
    <link rel="stylesheet" href="{{asset('\bootstrap-duallistbox\dist\bootstrap-duallistbox.css')}}">
@endsection

@section('js')
    <script src="{{asset('\bootstrap-duallistbox\dist\jquery.bootstrap-duallistbox.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            let addPermBtn = '<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">'+
                                        'Adicionar permissão'+
                                    '</button>';
            let permissoes = $('select[name="permissoes[]"]')
                                .bootstrapDualListbox({
                                    nonSelectedListLabel: 'Não selecionadas',
                                    selectedListLabel: 'Selecionadas '+addPermBtn,
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
            
            $("#permission_form").submit(function(e) {
                e.preventDefault();
                let form = $(this);
                let actionUrl = form.attr('action');
                $.ajax({
                    type: "POST",
                    url: actionUrl,
                    data: form.serialize(),
                    dataType: 'json',
                    success: function(data) {
                        $("#permissoes").prepend(`<option value='${data.id}' selected>${data.name}</option>`);
                        permissoes.bootstrapDualListbox('refresh');
                        $('permission_name').val('');
                        $('#exampleModal').modal('hide')
                    },
                    error: function(error) {
                        $("#error_permission").html(error.responseJSON.errors.name[0]);
                    }
                });
            });
        });
    </script>
@endsection

@section('content_header')
    <h1>ACL</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Perfis</a> </li>
        <li class="breadcrumb-item">Editar Perfil</li>
    </ol>

@stop

@section('content')
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nova permissão</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form action="{{route("permissions.store")}}" method="POST" id="permission_form">
                        @csrf
                        <div class="row">
                            <div class="form-group @if ($errors->has('name')) has-error @endif">
                                <label for="name">Nome</label>
                                <input type="text" name="name" class="form-control" id="permission_name" placeholder="Nome do perfil">
                                <p class="help-block" id="error_permission"></p>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" form="permission_form" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </div>
    </div> 
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-5">
                    <h3>Editar perfil</h3>
                </div>
            </div>
            <div class="row">
                <div class="container">
                    <form action="{{route("roles.update",$role->id)}}" method="POST">
                        @method("PUT")
                        @csrf
                        <div class="row">
                            <div class="form-group @if ($errors->has('name')) has-error @endif">
                                <label for="name">Nome</label>
                                <input type="text" name="name" class="form-control" placeholder="Nome do perfil" value="{{old("name",$role->name)}}">
                                @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label for="name">
                                    Permissões  
                                </label>
                                <select name="permissoes[]" id="permissoes" multiple="true">
                                    @foreach ($permissoes as $permissao )
                                        <option value="{{$permissao->id}}" @if($role->permissions->pluck("id")->contains($permissao->id)) selected @endif">
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