<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use App\Models\Audit;
use App\Http\Requests;
use App\DataTables\AuditDataTable;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AppBaseController;

class AuditController extends AppBaseController
{
    /**
     * Display a listing of the Audit.
     *
     * @param AuditDataTable $auditDataTable
     *
     * @return Response
     */
    public function index(AuditDataTable $auditDataTable,$tipo,$id)
    {
        $auditaveis = config('audit.auditables',[]);
        $tipoWhere = isset($auditaveis[$tipo]) ? $auditaveis[$tipo] : '';
        $nome = "Auditorias do registro $id ($tipo)";

        return $auditDataTable
                    ->with([
                        'id' => $id,
                        'tipoWhere' => $tipoWhere
                    ])
                    ->render('audits.index');
    }

    public function downloadData($id) {
        $auditorias = DB::table("audits")->where("id",'=',$id)->get()->first();
        dd($auditorias);
        return response()->json($auditorias,200);
    }

}
