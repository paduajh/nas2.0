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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix' => 'precadastro'], function () {
    Route::resource('marcas', App\Http\Controllers\PreCadastro\MarcaController::class, ["as" => 'precadastro']);
});


Route::group(['prefix' => 'precadastro'], function () {
    Route::resource('modelos', App\Http\Controllers\PreCadastro\ModeloController::class, ["as" => 'precadastro']);
});


Route::group(['prefix' => 'precadastro'], function () {
    Route::resource('categorias', App\Http\Controllers\PreCadastro\CategoriaController::class, ["as" => 'precadastro']);
});


Route::group(['prefix' => 'precadastro'], function () {
    Route::resource('tipoDeVeiculos', App\Http\Controllers\PreCadastro\TipoDeVeiculoController::class, ["as" => 'precadastro']);
});


Route::group(['prefix' => 'precadastro'], function () {
    Route::resource('tipoDeCarrocerias', App\Http\Controllers\PreCadastro\TipoDeCarroceriaController::class, ["as" => 'precadastro']);
});


Route::group(['prefix' => 'precadastro'], function () {
    Route::resource('combustivels', App\Http\Controllers\PreCadastro\CombustivelController::class, ["as" => 'precadastro']);
});


Route::group(['prefix' => 'precadastro'], function () {
    Route::resource('tipoDeEnderecos', App\Http\Controllers\PreCadastro\TipoDeEnderecoController::class, ["as" => 'precadastro']);
});


Route::group(['prefix' => 'precadastro'], function () {
    Route::resource('documentoAvisos', App\Http\Controllers\PreCadastro\DocumentoAvisoController::class, ["as" => 'precadastro']);
});


Route::group(['prefix' => 'precadastro'], function () {
    Route::resource('naturezaSinistros', App\Http\Controllers\PreCadastro\NaturezaSinistroController::class, ["as" => 'precadastro']);
});


Route::group(['prefix' => 'precadastro'], function () {
    Route::resource('grupoLancamentos', App\Http\Controllers\PreCadastro\GrupoLancamentoController::class, ["as" => 'precadastro']);
});


Route::group(['prefix' => 'precadastro'], function () {
    Route::resource('centroCustos', App\Http\Controllers\PreCadastro\CentroCustoController::class, ["as" => 'precadastro']);
});


Route::group(['prefix' => 'precadastro'], function () {
    Route::resource('contas', App\Http\Controllers\PreCadastro\ContaController::class, ["as" => 'precadastro']);
});


Route::group(['prefix' => 'precadastro'], function () {
    Route::resource('formaPagamentos', App\Http\Controllers\PreCadastro\FormaPagamentoController::class, ["as" => 'precadastro']);
});


Route::group(['prefix' => 'acl'], function () {
    Route::resource('permissions', App\Http\Controllers\Acl\PermissionController::class, ["as" => 'acl']);
});


Route::group(['prefix' => 'acl'], function () {
    Route::resource('roles', App\Http\Controllers\Acl\RoleController::class, ["as" => 'acl']);
});
