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

Route::get('/', 'Site\\AgendaController@index');

Route::get('/cadastro', 'Site\\AgendaController@criar');
Route::get('/editar/{id}', 'Site\\AgendaController@editar');
Route::get('/agenda/{id}', 'Site\\AgendaController@agenda');
