<?php

namespace Database\States;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class GaranteAcessos {

    private $insertData;
    private $admin_role;
    private $default_role;

    public function __construct() {
        $this->admin_role = $this->getRole('admin');
        $this->default_role = $this->getRole('default');
    
        $this->insertData =  [
            ['permission_id'=>$this->getPermission('ver_usuarios'),'role_id'=>$this->admin_role],
            ['permission_id'=>$this->getPermission('ver_usuarios'),'role_id'=>$this->default_role],
            ['permission_id'=>$this->getPermission('add_usuarios'),'role_id'=>$this->admin_role],
            ['permission_id'=>$this->getPermission('edit_usuarios'),'role_id'=>$this->admin_role],
            ['permission_id'=>$this->getPermission('delete_usuarios'),'role_id'=>$this->admin_role],
    
            ['permission_id'=>$this->getPermission('ver_perfis'),'role_id'=>$this->admin_role],
            ['permission_id'=>$this->getPermission('ver_perfis'),'role_id'=>$this->default_role],
            ['permission_id'=>$this->getPermission('add_perfis'),'role_id'=>$this->admin_role],
            ['permission_id'=>$this->getPermission('edit_perfis'),'role_id'=>$this->admin_role],
            ['permission_id'=>$this->getPermission('delete_perfis'),'role_id'=>$this->admin_role],
            
            ['permission_id'=>$this->getPermission('ver_permissoes'),'role_id'=>$this->admin_role],
            ['permission_id'=>$this->getPermission('ver_permissoes'),'role_id'=>$this->default_role],
            ['permission_id'=>$this->getPermission('add_permissoes'),'role_id'=>$this->admin_role],
            ['permission_id'=>$this->getPermission('edit_permissoes'),'role_id'=>$this->admin_role],
            ['permission_id'=>$this->getPermission('delete_permissoes'),'role_id'=>$this->admin_role]
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

    private function getPermission($permission) {
        return DB::table('permissions')
                        ->select('id')
                        ->where('name','=',$permission)
                        ->where("guard_name",'=','web')
                        ->value('id');
    }

    private function executar() {
        foreach($this->insertData as $insertData) {
            try {
                DB::table('role_has_permissions')->upsert($insertData,['permission_id','role_id']);
            } 
            catch (\Throwable $th) {}
        }
        return Command::SUCCESS;
    }
}