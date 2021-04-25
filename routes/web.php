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
    return view('menu');
});
Route::get('/menu', function(){
    return view('menu');
});

Route::resource('almacen/categoria', 'CategoriaController');
Route::resource('almacen/genero', 'GeneroController');
Route::resource('almacen/departamento', 'DepartamentoController');
Route::resource('almacen/cliente', 'ClienteController');
