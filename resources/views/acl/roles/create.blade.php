@extends('layouts.app')

@push('page_css')
<link rel="stylesheet" href="{{asset('\bootstrap-duallistbox\dist\bootstrap-duallistbox.css')}}">
@endpush

@push('page_scripts')
<script src="{{asset('bootstrap-duallistbox\dist\jquery.bootstrap-duallistbox.min.js')}}"></script>
<script>
    $(document).ready(function() {
        let permissoes = $('select[name="permissoes[]"]')
                            .bootstrapDualListbox({
                                nonSelectedListLabel: 'Não selecionadas',
                                selectedListLabel: 'Selecionadas ',
                                infoText: 'Mostrando todas as permissões ({0})',
                                infoTextEmpty: "Sem permissões para mostrar",
                                infoTextFiltered: '<span class="label label-warning">Filtradas</span> {0} de {1}',
                                removeAllLabel: 'Remover todas',
                                removeSelectedLabel: 'Remover Selecionadas',
                                moveAllLabel: "Mover todas",
                                moveSelectedLabel: "Mover selecionadas",
                                filterPlaceHolder: "Filtrar",
                                filterTextClear: "Mostrar todas"
                            });

        let customSettings = permissoes.bootstrapDualListbox('getContainer');
        customSettings.find('.moveall i').removeClass().addClass('fas fa-arrow-right');
        customSettings.find('.removeall i').removeClass().addClass('fas fa-arrow-left');
    });
</script>
@endpush

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                     @lang('models/roles.singular')
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'acl.roles.store']) !!}

            <div class="card-body">
                <div class="row">
                    @include('acl.roles.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('acl.roles.index') }}" class="btn btn-default">
                 @lang('crud.cancel')
                </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
