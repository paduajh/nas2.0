<?php

namespace App\Providers;

use App\Models\PreCadastro\Marca;
use App\Models\PreCadastro\Modelo;
use App\Observers\MarcaObserver;
use App\Observers\ModeloObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Marca::observe(MarcaObserver::class);
        Modelo::observe(ModeloObserver::class);

        Schema::defaultStringLength(191);
    }
}
