<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuditoriaController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id,$tipo)
    {
        $auditaveis = config('audit.auditables',[]);
        $tipoWhere = isset($auditaveis[$tipo]) ? $auditaveis[$tipo] : '';
        $nome = "Auditorias do registro $id ($tipo)";
        $heads = [
            '#',
            'Usuário',
            'Evento',
            'URL',
            'IP',
            'Criado Em',
            'Ações'
        ];
    
        $auditorias = DB::table("audits")
            ->select('audits.id','users.name','audits.event','audits.url','audits.ip_address','audits.created_at')
            ->join('users','users.id','=','audits.user_id')
            ->where("auditable_type","=",$tipoWhere)
            ->where("auditable_id","=",$id)
            ->get()
            ->each(function($item) {
                $id = $item->id;
                $item->acao = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="download" onclick="downloadData('.$id.')">
                <i class="fa fa-lg fa-fw fa-download"></i>
            </button>';
            })
            ->map(function($item) {
                return collect($item)->values();
            })
            ->toArray();
        $config = [
            'data' => $auditorias,
            'columns' => [null,null, null, null, null, null,['orderable' => false]],
        ];

        

        return view('auditoria.index',compact('auditaveis','heads','config','nome'));
    }

    public function downloadData($id) {
        $auditorias = DB::table("audits")->where("id",'=',$id)->get()->first();
        return response()->json($auditorias,200);
    }
}
