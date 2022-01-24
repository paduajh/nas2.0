<?php

namespace Database\States;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class GarantePermissoes {

    private $insertData;

    public function __construct() {
        $this->insertData =  [
            ['name'=>'ver_usuarios','guard_name'=>'web','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'add_usuarios','guard_name'=>'web','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'edit_usuarios','guard_name'=>'web','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'delete_usuarios','guard_name'=>'web','created_at'=>now(),'updated_at'=>now()],
    
            ['name'=>'ver_perfis','guard_name'=>'web','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'add_perfis','guard_name'=>'web','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'edit_perfis','guard_name'=>'web','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'delete_perfis','guard_name'=>'web','created_at'=>now(),'updated_at'=>now()],
    
            ['name'=>'ver_permissoes','guard_name'=>'web','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'add_permissoes','guard_name'=>'web','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'edit_permissoes','guard_name'=>'web','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'delete_permissoes','guard_name'=>'web','created_at'=>now(),'updated_at'=>now()]
        ];
    }

    public function __invoke() {
        return $this->executar();
    }

    private function executar() {
        foreach($this->insertData as $insertData) {
            try {
                DB::table('permissions')->upsert($insertData,['name','guard_name']);
            } 
            catch (\Throwable $th) {}
        }
        return Command::SUCCESS;
        
    }
}