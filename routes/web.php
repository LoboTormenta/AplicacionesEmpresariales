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

Route::get('/empleado', [prueba::class, 'index']);

Route::post('/guardar', [prueba::class, 'create'])->name('empleados.guardar');



