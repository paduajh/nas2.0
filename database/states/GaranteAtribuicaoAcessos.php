<?php

namespace Database\States;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class GaranteAtribuicaoAcessos {

    private $admin;
    private $default;
    private $admin_role;
    private $default_role;

    public function __construct() {
        $this->admin = $this->getUsuario("admin@usuario.com");
        $this->default = $this->getUsuario("usuariopadrao@usuario.com");
        $this->admin_role = $this->getRole('admin');
        $this->default_role = $this->getRole('default');
        $this->insertData =  [
            ['role_id'=>$this->admin_role,'model_id'=>$this->admin,'model_type' => 'App\Models\User'],
            ['role_id'=>$this->default_role,'model_id'=>$this->default,'model_type' => 'App\Models\User'],
        ];

    }

    public function __invoke() {
       return $this->executar();
    }

    private function getRole($role) {
        return DB::table('roles')
                        ->select('id')
                        ->where('name','=',$role)
                        ->where("guard_name",'=','web')
                        ->value('id');
    }

    private function getUsuario($email) {
        return DB::table('users')
                        ->select('id')
                        ->where('email','=',$email)
                        ->value('id');
    }

    private function executar() {
        foreach($this->insertData as $insertData) {
            try {
                DB::table('model_has_roles')->upsert($insertData,['role_id','model_id','model_type']);
            } 
            catch (\Throwable $th) {}
        }
        return Command::SUCCESS;
    }
}