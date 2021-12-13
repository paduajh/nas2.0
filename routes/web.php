<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::prefix('admin')
        ->namespace('PreCadastro')
        ->group(function(){
            Route::get('marcas/create', 'marcaController@create')->name('marcas.create');
            Route::any('marcas/search', 'marcaController@search')->name('marcas.search');
            Route::get('marcas/{url}','marcaController@show')->name('marcas.show');
            Route::get('marcas/{url}/edit','marcaController@edit')->name('marcas.edit');
            Route::put('marcas/{url}','marcaController@update')->name('marcas.update');
            Route::delete('marcas/{url}','marcaController@destroy')->name('marcas.destroy');
            Route::post('marcas', 'marcaController@store')->name('marcas.store');
            Route::get('marcas', 'marcaController@index')->name('marcas.index');
            Route::get('index', 'marcaController@index')->name('admin.index');
        });

        
Route::get('/', function () {
    return view('welcome');
});
