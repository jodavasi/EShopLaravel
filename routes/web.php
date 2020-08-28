<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/homeAdmin', 'HomeController@index')->name('homeAdmin');

Route::resource('categorias', 'CategoriaController');
Route::resource('productos', 'ProductoController');
Route::resource('ventas', 'CarritoController');
Route::resource('carrito', 'CarritoUsuarioController');
Route::resource('compra', 'FacturaController');


