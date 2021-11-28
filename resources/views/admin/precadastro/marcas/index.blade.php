@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Marcas <a href="{{route('marcas.create')}}" class="btn btn-dark">Cadastrar</a></h1>
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
                        <th width ="50">Ações</th>
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
                                <a href="{{route('marcas.show',$marca->url)}}" class="btn btn-warning"> Ver </a>
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
