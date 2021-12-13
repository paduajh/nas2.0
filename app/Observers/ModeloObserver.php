<?php

namespace App\Observers;
use Illuminate\Support\Str;
use App\Models\PreCadastro\Modelo;

class ModeloObserver
{
    /**
     * Handle the Modelo "creating" event.
     *
     * @param  \App\Models\PreCadastro\Modelo  $modelo
     * @return void
     */
    public function creating(Modelo $modelo)
    {
        $modelo->url = Str::kebab($modelo->name);
    }

    /**
     * Handle the Modelo "updateing" event.
     *
     * @param  \App\Models\PreCadastro\Modelo  $modelo
     * @return void
     */
    public function updating(Modelo $modelo)
    {
        $modelo->url = Str::kebab($modelo->name);
    }

    
}
