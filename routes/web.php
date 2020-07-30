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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/empresa', 'EmpresaController@show')->name('empresa.show');
Route::post('/empresa/edit', 'EmpresaController@update')->name('empresa.update');

Route::resources([
    'clientes' => 'ClienteController',
    'obras' => 'ObraController',
    'cuentas' => 'CuentaController',
    'presupuestos' => 'PresupuestoController',
    'pagos' => 'EstadoPagoController',
    'estados-obra' => 'EstadoObraController',
    'controles-pago' => 'ControlPagoController',
    'tipos-cuenta' => 'TipoCuentaController',
    'medios-pago' => 'MedioPagoController',
    'bancos' => 'BancoController',
    'productos' => 'ProductoController'
]);
