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

Route::get('/listarUsuarios','UsuarioController@listarUsuarios');
Route::get('/editarUsuario{id}','UsuarioController@editarUsuario');
Route::get('/remover/usuario{id}','UsuarioController@remover');
Route::get('/atualizarUsuario','UsuarioController@atualizarUsuario');
Route::post('/checarEmail', 'UsuarioController@checarEmail');
Route::post('/cadastrarUsuario', 'UsuarioController@cadastrarUsuario');

Route::post('/criarPersona', 'PersonaController@criarPersona');
Route::post('/inserirPersona', 'PersonaController@inserirPersona');

Route::post('/criarGuilda', 'GuildaController@criarGuilda');
Route::post('/inserirGuilda', 'GuildaController@inserirGuilda');
Route::post('/minhasGuildas', 'GuildaController@verMinhasGuildas');
Route::get('/home/guilda/{nome}', 'GuildaController@verPerfilGuilda');

Route::post('/cadastrarGame', 'GameController@cadastrarGame');
Route::post('/inserirGame', 'GameController@inserirGame');

Route::post('/Novo Post', 'PostController@criarPost');
Route::post('/inserirPost', 'PostController@inserirPost');


Route::get('/main','MainController@index');
Route::get('/home', 'MainController@showHome');
Route::post('/checarLogin','MainController@checarLogin');
Route::get('/escolherPersona','PersonaController@escolherPersona');
Route::post('personaEscolhida','PersonaController@personaEscolhida');
Route::get('/main/loginEfetuadoAdmin','MainController@loginEfetuadoAdmin');
Route::get('/main/loginEfetuado','MainController@loginEfetuado');
Route::get('/main/sair','MainController@sair');



