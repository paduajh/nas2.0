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

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth'])->group(function() {
    Route::prefix('config')->group(function() {
        //**Rotas Marcas*/
        Route::get('marcas/create', 'marcaController@create')->name('marcas.create');
        Route::any('marcas/search', 'marcaController@search')->name('marcas.search');
        Route::get('marcas/{url}','marcaController@show')->name('marcas.show');
        Route::get('marcas/{url}/edit','marcaController@edit')->name('marcas.edit');
        Route::put('marcas/{url}','marcaController@update')->name('marcas.update');
        Route::delete('marcas/{url}','marcaController@destroy')->name('marcas.destroy');
        Route::post('marcas', 'marcaController@store')->name('marcas.store');
        Route::get('marcas', 'marcaController@index')->name('marcas.index');

        //**Rotas Modelo*/
        Route::get('modelos/create', 'modeloController@create')->name('modelo.create');
        Route::any('modelos/search', 'modeloController@search')->name('modelo.search');
        Route::get('modelos/{url}','modeloController@show')->name('modelo.show');
        Route::get('modelos/{url}/edit','modeloController@edit')->name('modelo.edit');
        Route::put('modelos/{url}','modeloController@update')->name('modelo.update');
        Route::delete('modelos/{url}','modeloController@destroy')->name('modelo.destroy');
        Route::post('modelos', 'modeloController@store')->name('modelo.store');
        Route::get('modelos', 'modeloController@index')->name('modelo.index');
    });
    
    Route::prefix('acl')->group(function() {
        Route::resource('users', 'UserController');
        Route::resource('roles', 'RoleController');
        Route::resource('permissions', 'PermissionController');
    });

    Route::get("auditorias/{id}/download","AuditoriaController@downloadData")->name("auditorias.download");
    Route::get("auditorias/{tipo}/{id}","AuditoriaController@index")->name("auditorias");
    
});



Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
