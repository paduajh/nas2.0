@extends('adminlte::page')

@section('title', "Detalhes da Modelo {$modelo->name}")

@section('content_header')
    <h1>Detalhes do Modelo <strong> {{ $modelo->name }} </strong></h1> 
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <ul>
            <li>
                <strong>Nome:</strong> {{$modelo->name}}
            </li>
        </ul>
      
        <ul>
            <form action="{{ route('modelo.destroy',$modelo->url) }}" method="POST">
            @csrf
            @method('DELETE')
            <a href="{{ route('modelo.index')}}" class="btn btn-primary">Voltar</a>
            <a href="{{route('modelo.edit',$modelo->url)}}" class="btn btn-success">Editar</a>
            <button type="submit" class="btn btn-danger">Deletar</button>
            </form>
        </ul>
    </div>
</div>
@endsection