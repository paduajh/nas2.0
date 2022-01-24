@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <h1>ACL</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item">Usuários</li>
    </ol>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-5">
                    <h3>Usuários</h3>
                </div>
                <div class="col-md-7 page-action text-right">
                    @can('add_perfis')
                        <a href="{{route("users.create")}}" class="btn btn-sm btn-success pull-right"> <i class="glyphicon glyphicon-plus"></i> Novo usuário</a>
                    @endcan
                </div>
            </div>
            <div class="row">
                <table class="table table-bordered table-striped table-hover" id="data-table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Criado em</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($result as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->created_at->diffForHumans()}}</td>
                            <td>
                                <form action="{{route('users.destroy',$item->id)}}" method="POST">
                                    <a href="{{route("auditorias",[$item->id,'usuarios'])}}" class="btn btn-info btn-sm">Auditar</a>
                                    <a href="{{route("users.edit",$item->id)}}" class="btn btn-warning btn-sm">Editar</a>
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row">
                {{ $result->links() }}
            </div>
   
        </div>  
    </div>
@endsection