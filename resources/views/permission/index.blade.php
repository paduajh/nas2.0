@extends('adminlte::page')

@section('title', 'Permissões')

@section('content_header')
    <h1>ACL</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item">Permissões</li>
    </ol>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-5">
                    <h3>Permissões</h3>
                </div>
                <div class="col-md-7 page-action text-right">
                    @can('add_perfis')
                        <a href="{{route("permissions.create")}}" class="btn btn-sm btn-success pull-right"> <i class="glyphicon glyphicon-plus"></i> Nova permissão</a>
                    @endcan
                </div>
            </div>
            <div class="row">
                <table class="table table-bordered table-hover" style="text-align: center">
                    <thead>
                        <tr>
                            <th>Permissão</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($permissions as $permission)
                            <tr>
                                <td>{{$permission->name}}</td>
                                <td>
                                    <form action="{{route("permissions.destroy",$permission->id)}}" method="POST"> 
                                        @csrf
                                        @method("DELETE")
                                        <a href="{{route("auditorias",[$permission->id,'permissoes'])}}" class="btn btn-info btn-sm">Auditar</a>
                                        <button type="subit" class="btn btn-danger btn-sm">Excluir</button>
                                    </form>
                                      
                                </td>    
                            </tr>  
                        @empty
                            <tr>
                                <td colspan="2">
                                    Sem permissões para exibir.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="row">
                {{ $permissions->links() }}
            </div>
   
        </div>  
    </div>
@endsection