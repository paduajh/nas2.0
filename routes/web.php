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

Route::get('admin/marcas/create', 'PreCadastro\marcaController@create')->name('marcas.create');
Route::get('admin/marcas/{url}','PreCadastro\marcaController@show')->name('marcas.show');
Route::delete('admin/marcas/{url}','PreCadastro\marcaController@destroy')->name('marcas.destroy');
Route::post('admin/marcas', 'Precadastro\marcaController@store')->name('marcas.store');
Route::get('admin/marcas', 'PreCadastro\marcaController@index')->name('marcas.index');

Route::get('/', function () {
    return view('welcome');
});
