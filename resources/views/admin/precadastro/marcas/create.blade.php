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

                @include('admin.precadastro.marcas._partials.form')
            </form>
        </div>
    </div>
@endsection
