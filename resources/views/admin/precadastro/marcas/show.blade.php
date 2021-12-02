@extends('adminlte::page')

@section('title', "Detalhes da marca {$marca->name}")

@section('content_header')
    <h1>Detalhes da marca <strong> {{ $marca->name }} </strong></h1> 
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <ul>
            <li>
                <strong>Nome:</strong> {{$marca->name}}
            </li>
        </ul>
      
        <ul>
            <form action="{{ route('marcas.destroy',$marca->url) }}" method="POST">
            @csrf
            @method('DELETE')
            <a href="{{ route('marcas.index')}}" class="btn btn-primary">Voltar</a>
            <a href="{{route('marcas.edit',$marca->url)}}" class="btn btn-success">Editar</a>
            <button type="submit" class="btn btn-danger">Deletar</button>
            </form>
        </ul>
    </div>
</div>
@endsection