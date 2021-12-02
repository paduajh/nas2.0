@extends('adminlte::page')

@section('title', "Editando a marca {$marca->name}" )

@section('content_header')
    <h1>Editar a Marca: {{ $marca->name }} </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('marcas.update', $marca->url) }}" class="form" method="POST">
               @csrf
               @method('PUT')
            
               @include('admin.precadastro.marcas._partials.form')
            </form>
        </div>
    </div>
@endsection
