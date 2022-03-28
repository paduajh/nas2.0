<?php

namespace App\DataTables;

use App\Models\Audit;
use Yajra\DataTables\Html\Column;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;

class AuditDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'audits.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Audit $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Audit $model)
    {
        return Audit::join('users','users.id','=','audits.user_id')
                ->select('audits.id','users.name','audits.event','audits.url','audits.ip_address','audits.created_at')
                ->where("auditable_type","=",$this->tipoWhere)
                ->where("auditable_id","=",$this->id);

    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false, 'title' => __('crud.action')])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    [
                       'extend' => 'export',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-download"></i> ' .__('auth.app.export').''
                    ],
                    [
                       'extend' => 'print',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-print"></i> ' .__('auth.app.print').''
                    ],
                    [
                       'extend' => 'reset',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-undo"></i> ' .__('auth.app.reset').''
                    ],
                    [
                       'extend' => 'reload',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-refresh"></i> ' .__('auth.app.reload').''
                    ],
                ],
                 'language' => [
                   'url' => url('//cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json'),
                 ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id' => new Column(['id' => '#', 'data' => 'id']),
            'name' => new Column(['title' => __('models/users.fields.name'), 'data' => 'name']),
            'event' => new Column(['title' => __('models/audits.fields.event'), 'data' => 'event']),
            'url' => new Column(['title' => __('models/audits.fields.url'), 'data' => 'url']),
            'ip_address' => new Column(['title' => __('models/audits.fields.ip_address'), 'data' => 'ip_address']),
            'created_at' => new Column(['title' => __('models/audits.fields.created_at'), 'data' => 'created_at']),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'audits_datatable_' . time();
    }
}
