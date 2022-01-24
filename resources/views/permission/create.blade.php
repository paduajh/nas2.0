@extends('adminlte::page')

@section('title', 'Permissões')

@section('content_header')
    <h1>ACL</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">Permissões</a> </li>
        <li class="breadcrumb-item">Nova permissão</li>
    </ol>

@stop

@section('content')   
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-5">
                    <h3>Nova Permissão</h3>
                </div>
            </div>
            <div class="row">
                <div class="container">
                    <form action="{{route("permissions.store")}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group @if ($errors->has('name')) has-error @endif">
                                <label for="name">Nome</label>
                                <input type="text" name="name" class="form-control" placeholder="Nome do perfil">
                                @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                            </div>
                        </div>
                        <div class="row">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>  
    </div>
@endsection