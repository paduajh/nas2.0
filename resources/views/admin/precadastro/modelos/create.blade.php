@extends('adminlte::page')

@section('title', 'Cadastrar novo Modelo')

@section('content_header')
    <h1>Cadastrar novo Modelo</h1> 
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('modelo.store') }}" class="form" method="POST">
                @csrf

                @include('admin.precadastro.modelos._partials.form')
            </form>
        </div>
    </div>
@endsection
