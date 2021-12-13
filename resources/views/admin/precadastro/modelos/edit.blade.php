@extends('adminlte::page')

@section('title', "Editando o modelo {$modelo->name}" )

@section('content_header')
    <h1>Editar o modelo: {{ $modelo->name }} </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('modelo.update', $modelo->url) }}" class="form" method="POST">
               @csrf
               @method('PUT')
            
               @include('admin.precadastro.modelos._partials.form')
            </form>
        </div>
    </div>
@endsection
