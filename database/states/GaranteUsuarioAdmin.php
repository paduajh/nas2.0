<?php

namespace Database\States;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class GaranteUsuarioAdmin {

    private $insertData;

    public function __construct() {
        $this->insertData = [
            'name' => 'Admin',
            'email' => 'admin@usuario.com',
            'email_verified_at' => now(),
            'password' => Hash::make("password"),
            'remember_token' => Str::random(10),
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
        return DB::table('users')->where('email','=','admin@usuario.com')->count() > 0;
    }

    private function executar() {
        try {
            DB::table('users')->insert($this->insertData);
            return Command::SUCCESS;
        } 
        catch (\Throwable $th) {
            return Command::FAILURE;
        }
    }
}