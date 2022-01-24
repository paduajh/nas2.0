@extends('adminlte::page')

@section('title', 'Auditorias')

@section('content_header')
    <h1>{{$nome}}</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item">{{$nome}}</li>
    </ol>

@stop

@section('js')
    <script>
        function downloadData(id) {
            let baseUrl = window.location.origin;
            $.ajax({
                type: "GET",
                url: `${baseUrl}/auditorias/${id}/download`,
                dataType: 'json',
                success: function(data) {
                    let dataStr = "data:text/json;charset=utf-8," + encodeURIComponent(JSON.stringify(data,null, 2));
                    let downloadAnchorNode = document.createElement('a');
                    downloadAnchorNode.setAttribute("href",     dataStr);
                    downloadAnchorNode.setAttribute("download","auditoria_"+id+".json");
                    document.body.appendChild(downloadAnchorNode); // required for firefox
                    downloadAnchorNode.click();
                    downloadAnchorNode.remove();
                },
                error: function(error) {
                    alert("Erro ao baixar dados");
                }
            });
        }
    </script>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-5">
                    <h3>{{$nome}}</h3>
                </div>
            </div>
            <div class="row">
                <x-adminlte-datatable id="table3" :heads="$heads" :config="$config" theme="default" striped hoverable beautify compressed/>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{back()}}" class="btn btn-default btn-sm">Voltar</a>
        </div>  
    </div>
@endsection