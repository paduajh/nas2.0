<?php

namespace App\Observers;
use Illuminate\Support\Str;
use App\Models\PreCadastro\Marca;

class MarcaObserver
{
    /**
     * Handle the Marca "creating" event.
     *
     * @param  \App\Models\PreCadastro\Marca  $marca
     * @return void
     */
    public function creating(Marca $marca)
    {
       $marca->url = Str::kebab($marca->name);
    }

    /**
     * Handle the Marca "updating" event.
     *
     * @param  \App\Models\PreCadastro\Marca  $marca
     * @return void
     */
    public function updating(Marca $marca)
    {
        $marca->url = Str::kebab($marca->name);
    }
    
}
