@extends('adminlte::page')

@section('title', 'Cadastrar nova Marca')

@section('content_header')
    <h1>Cadastrar nova marca</h1> 
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('marcas.store') }}" class="form" method="POST">
                @csrf

                <div class="form-group">
                    <label>Nome:</label>
                    <input type="text" name="name" class="form-control" placeholder="Nome:" >
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Enviar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
