<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/agenda', 'Api\\AgendaController@listarAgenda');
Route::post('/agenda', 'Api\\AgendaController@adicionar');
Route::post('/agenda/{id}', 'Api\\AgendaController@atualizar');
Route::get('/agenda/{id}/deletar', 'Api\\AgendaController@deletar');