<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\prueba;


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

// Route::get('/',[prueba::class, 'index']);

// Route::get('/empleado', [prueba::class, 'index']);

// Route::post('/guardar', [prueba::class, 'create'])->name('empleados.guardar');

// Route::put('/editar', [prueba::class, 'update'])->name('empleados.editar');


Route::get('/', function () {
    return view('welcome');
});

// Route::get('/{vue_capture?}', function () {
//     return view('layouts.master');
// })->where('vue_capture', '[\/\w\.-]*');

Route::get('/empleado', [prueba::class, 'index']);
Route::post('/empleado/registrar', [prueba::class, 'create']);
Route::put('/empleado/actualizar', [prueba::class, 'update']);
Route::delete('empleado/eliminar/{id}', [prueba::class, 'destroy']);
