@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')
    <h1>ACL</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item">Perfis</li>
    </ol>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-5">
                    <h3>Perfis</h3>
                </div>
                <div class="col-md-7 page-action text-right">
                    @can('add_perfis')
                        <a href="{{route("roles.create")}}" class="btn btn-sm btn-success pull-right"> <i class="glyphicon glyphicon-plus"></i> Novo perfil</a>
                    @endcan
                </div>
            </div>
            <div class="row">
                <table class="table table-bordered table-hover" style="text-align: center">
                    <thead>
                        <tr>
                            <th>Perfil</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($roles as $role)
                            <tr>
                                <td>{{$role->name}}</td>
                                <td>
                                    
                                    <form action="{{route("roles.destroy",$role->id)}}" method="POST">
                                        @can('edit_perfis')
                                        <a href="{{route("roles.edit",$role->id)}}" class="btn btn-warning btn-sm">
                                            Editar
                                        </a>
                                        @endcan
                                        <a href="{{route("auditorias",[$role->id,'perfis'])}}" class="btn btn-info btn-sm">Auditar</a>  
                                        @csrf
                                        @method("DELETE")
                                        <button type="subit" class="btn btn-danger btn-sm">Excluir</button>
                                    </form>
                                    
                                      
                                </td>    
                            </tr>  
                        @empty
                            <tr>
                                <td colspan="2">
                                    Sem perfis para exibir.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="row">
                {{ $roles->links() }}
            </div>
   
        </div>  
    </div>
@endsection