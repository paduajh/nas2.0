@extends('adminlte::page')

@section('title', 'Marcas')

@section('content_header')
    <h1>Marcas <a href="{{route('marcas.create')}}" class="btn btn-dark">Cadastrar</a></h1>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route ('marcas.index') }}">Marcas</a></li>
</ol>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
           <form action="{{ route('marcas.search') }}" method="POST" class="form form-inline">
            @csrf
            <input type="text" name="filter" placeholder="pesquise por..."class="form-control" value="{{ $filters['filter'] ?? '' }}">
            <button type="submit" class="btn btn-dark">Filtrar</button>       
        </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th width ="150">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($marcas as $marca)
                        <tr>
                            <td>
                                {{$marca->id}}
                            </td>
                            <td>
                                {{ $marca->name }}
                            </td>
                            <td>
                                <a href="{{route('marcas.show',$marca->url)}}" class="btn btn-warning">Ver</a>
                                <a href="{{route('marcas.edit',$marca->url)}}" class="btn btn-success">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
            {!! $marcas->appends($filters)->links("pagination::bootstrap-4") !!}
            
            @else
            {!! $marcas->links("pagination::bootstrap-4") !!}                
            @endif
        </div>
    </div>
@stop
