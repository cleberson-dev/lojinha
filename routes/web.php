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

Route::get('', 'ProdutoController@index');
Route::post('', 'ProdutoController@store');
Route::put('{id}', 'ProdutoController@update');
Route::delete('{id}', 'ProdutoController@destroy');
