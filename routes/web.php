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


Route::post('/RegistrarContenido', 'ApiController@RegistrarContenido');
Route::post('/EditarContenido/{id}', 'ApiController@EditarContenido');
Route::get('/EliminarContenido/{id}', 'ApiController@EliminarContenido');
Route::get('/MostrarContenido', 'ApiController@MostrarContenido');
Route::get('/MostrarContenidoId/{id}', 'ApiController@MostrarContenidoId');
Route::get('/MostrarPeliculas', 'ApiController@MostrarPeliculas');
Route::get('/MostrarSeries', 'ApiController@MostrarSeries');
