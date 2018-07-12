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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/listar/usuario','UsuarioController@listar');
Route::get('/editar/usuario{id}','UsuarioController@editar');
Route::get('/remover/usuario{id}','UsuarioController@remover');
Route::post('/atualizar/usuario','UsuarioController@atualizar');
Route::get('/adicionar/usuario', 'UsuarioController@prepararAdicionar');
Route::post('/adicionar/usuario', 'UsuarioController@adicionar');