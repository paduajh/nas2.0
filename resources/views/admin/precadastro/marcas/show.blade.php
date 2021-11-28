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
            <li>
                <strong>URL:</strong> {{$marca->url}}
            </li>
        
        <br><a href="{{ route('marcas.index')}}" class="btn btn-primary">Voltar</a>
    </div>
</div>
@endsection