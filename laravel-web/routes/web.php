<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\MesasController;
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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

//app 1

Route::get('login', function () {
    return view('app.index');
})->name('login');


Route::get('registrar', function () {
    return view('app.registrar');
})->name('registrar');




Route::get('/', function () {
    return view('app.menu');
})->name('menu');

Route::get('productos3', function () {
    return view('app.productos');
})->name('productos3');


//app2


Route::get('dentro', function () {
    return view('app2.menu');
})->name('menu2');

Route::get('productos2', function () {
    return view('app2.productos');
})->name('productos2');


Route::get('reserva2', function () {
    return view('app2.reserva');
})->name('reserva2');

//app3

Route::get('admin', function () {
    return view('app3.menu');
})->name('menu3');

Route::get('administrar', function () {
    return view('app3.administrar');
})->name('administrar');

Route::get('crear', function () {
    return view('app3.crear');
})->name('crear');


Route::get('crearcat', function () {
    return view('app3.crearcat');
})->name('crearcat');


Route::get('productos', function () {
    return view('app3.productos');
})->name('productos');





Route::get('crearpro', function () {
    return view('app3.crearpro');
})->name('crearpro');

Route::get('mesas', function () {
    return view('app3.mesas');
})->name('mesas');

Route::get('crearmesa', function () {
    return view('app3.crearmesa');
})->name('crearmesa');

Route::get('reserva3', function () {
    return view('app3.reserva');
})->name('reserva3');



//login
Route::post('login', [ClientesController::class, 'login'])->name('user.login');
//crear
//usuarios
Route::post('registrar', [ClientesController::class, 'store'])->name('registro');

Route::post('crear', [ClientesController::class, 'store2'])->name('crear');

//categorias
Route::post('crearcat', [CategoriasController::class, 'storecat'])->name('crearcat');

//mesas
Route::post('crearmesa', [MesasController::class, 'storemesa'])->name('crearmesa');

//productos
Route::post('crearpro', [ProductosController::class, 'storepro'])->name('crearpro');

Route::get('/selectview', 'ClientesController@get');


//borrar
//categorias
Route::delete('/{id}', [CategoriasController::class, 'destroycat'])->name('destroycat');

//productos
Route::post('borrar-producto/{id}', [ProductosController::class, 'destroypro'])->name('destroypro');

//clientes
Route::post('/{id}', [ClientesController::class, 'destroy'])->name('destroy');

//mesas
Route::post('borrar-mesa/{id}', [MesasController::class, 'destroymesa'])->name('destroymesa');

//mesas

//UPDATE
Route::post('update-mesa/{numero}', [MesasController::class, 'update']);