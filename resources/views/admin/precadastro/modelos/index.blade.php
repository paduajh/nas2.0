@extends('adminlte::page')

@section('title', 'Modelos')

@section('content_header')
    <h1>Modelos <a href="{{route('modelo.create')}}" class="btn btn-dark">Cadastrar</a></h1>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route ('modelo.index') }}">Modelos</a></li>
</ol>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
           <form action="{{ route('modelo.search') }}" method="POST" class="form form-inline">
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
                    @foreach ($modelos as $modelo)
                        <tr>
                            <td>
                                {{$modelo->id}}
                            </td>
                            <td>
                                {{ $modelo->name }}
                            </td>
                            <td>
                                <a href="{{route('modelo.show',$modelo->url)}}" class="btn btn-warning">Ver</a>
                                <a href="{{route('modelo.edit',$modelo->url)}}" class="btn btn-success">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
            {!! $modelos->appends($filters)->links("pagination::bootstrap-4") !!}
            
            @else
            {!! $modelos->links("pagination::bootstrap-4") !!}                
            @endif
        </div>
    </div>
@stop
