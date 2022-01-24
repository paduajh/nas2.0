<?php

namespace App\Providers;

use App\Observers\MarcaObserver;
use App\Models\PreCadastro\Marca;
use App\Observers\ModeloObserver;
use App\Models\PreCadastro\Modelo;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

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
        Paginator::useBootstrap();
        Schema::defaultStringLength(191);
    }
}
