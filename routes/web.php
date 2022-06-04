<?php

use App\Http\Controllers\Admin\Detenido\celular\CelularControler;
use App\Http\Controllers\Admin\Detenido\celular\ContactosController;
use App\Http\Controllers\Admin\Detenido\DetenidoController;
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

/*Route::get('/', function () {
    return view('welcome');
});
*/
/*Route::middleware(['auth:sanctum', 'verified'])->get('/add', function () {
    return view('agenda.agregar.index');
})->name('add');*/
Route::resource('agenda', DetenidoController::class)->names('agenda')->middleware(['auth:sanctum', 'verified']);

//CELULAR
Route::resource('celular', CelularControler::class)->names('celular')->middleware(['auth:sanctum', 'verified']);
    Route::post('agenda/celular/{id}', [CelularControler::class, 'createcelular'])->name('agenda.celular');
    Route::post('agenda/celular', [CelularControler::class, 'storecelular'])->name('agenda.celular.store');
//CONTACTOS
Route::resource('contacto', ContactosController::class)->names('contacto')->middleware(['auth:sanctum', 'verified']);
Route::get('/contacts/import', [ContactosController::class, 'import'])->name('/contacts/import');
Route::post('/contacts/importData', [ContactosController::class, 'importData'])->name('/contacts/importData');

Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return view('agenda.inicio.index');
})->name('inicio');

Route::middleware(['auth:sanctum', 'verified'])->get('/busqueda', function () {
    return view('agenda.busqueda.index');
})->name('busqueda');

//CANCELAR ACCION
Route::get('agenda/{ruta}', function($ruta){return redirect()->route($ruta);})->name('cancelar');
