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

Route::get('/', 'App\Http\Controllers\NoticiaController@listaNoticia');
Route::get('/autor','App\Http\Controllers\AutorController@index');
Route::get('/categoria','App\Http\Controllers\CategoriaController@index');
Route::get('/noticia','App\Http\Controllers\NoticiaController@index');
Route::resource('/autor','App\Http\Controllers\AutorController');
Route::resource('/categoria','App\Http\Controllers\CategoriaController');
Route::resource('/noticia','App\Http\Controllers\NoticiaController');
