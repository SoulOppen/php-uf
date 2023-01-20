<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
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
Route::get('/', [PageController::class,'inicio'])->name('home');
Route::get('grafico', [PageController::class,'grafico'])->name('grafico');
Route::get('datos/',[PageController::class,'datos'] )->name('datos');
Route::get('datos/{id?}',[PageController::class,'value_uno'] )->name('value_uno');
Route::get('agregar',[PageController::class,'agregar'] )->name('agregar');
Route::post('datos/{id?}',[PageController::class,'crear'] )->name('value_crear');
Route::get('editar/{id?}',[PageController::class,'editar'] )->name('value_editar');
Route::put('editar/{id?}',[PageController::class,'actualizar'] )->name('value_update');
Route::delete('eliminar/{id?}',[PageController::class,'eliminar'] )->name('value_eliminar');