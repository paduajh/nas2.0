<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class LoadDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'load-database';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Carrega informações na base de dados';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        collect([
            new \Database\States\GaranteUsuarioAdmin,
            new \Database\States\GaranteUsuarioDefault,
            new \Database\States\GarantePerfilAdmin,
            new \Database\States\GarantePerfilDefault,
            // new \Database\States\GarantePermissoes,
        ])->each->__invoke();

        $this->call('create-permissions');
        collect([
            new \Database\States\GaranteAtribuicaoAcessos
        ])->each->__invoke();
    }
}
