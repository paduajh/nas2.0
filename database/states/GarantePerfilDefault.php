<?php

namespace Database\States;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class GarantePerfilDefault {

    private $insertData;

    public function __construct() {
        $this->insertData = [
            'name' => 'default',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now()
        ];
    }

    public function __invoke() {

        if($this->estaPresente())
            return Command::SUCCESS;

       return $this->executar();
    }

    private function estaPresente() {
        return DB::table('roles')->where('name','=','default')->count() > 0;
    }

    private function executar() {
        try {
            DB::table('roles')->insert($this->insertData);
            return Command::SUCCESS;
        } 
        catch (\Throwable $th) {
            return Command::FAILURE;
        }
    }
}