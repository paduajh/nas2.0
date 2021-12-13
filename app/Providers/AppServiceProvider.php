<?php

namespace App\Providers;

use App\Models\PreCadastro\Marca;
use App\Observers\MarcaObserver;
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

        Schema::defaultStringLength(191);
    }
}
