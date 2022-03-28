@extends('layouts.app')

@push('page_scripts')
    <script>
        function downloadData(id) {
            let baseUrl = window.location.origin;

            $.ajax({
                type: "GET",
                url: `${baseUrl}/audits/${id}/download`,
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
@endpush

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                   @lang('models/audits.plural')
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('audits.table')

                <div class="card-footer clearfix float-right">
                    <div class="float-right">

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


