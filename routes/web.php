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

Route::post('/procurarAmigo','AmigoController@procurarAmigo');
Route::post('/adicionarAmigo','AmigoController@adicionarAmigo');
Route::get('/listarAmigos','AmigoController@listarAmigos');
Route::post('/aceitarSolicitacao','AmigoController@aceitarSolicitacao');

Route::get('/editarUsuario{id}','UsuarioController@editarUsuario');
Route::get('/remover/usuario{id}','UsuarioController@remover');
Route::get('/atualizarUsuario','UsuarioController@atualizarUsuario');
Route::post('/checarEmail', 'UsuarioController@checarEmail');
Route::post('/cadastrarUsuario', 'UsuarioController@cadastrarUsuario');

Route::post('/verPerfilUsuario', 'UsuarioController@verPerfilUsuario');


Route::get('/cadastrarGame','GameController@cadastrarGame');
Route::post('/inserirGame', 'GameController@inserirGame');

Route::post('/solicitacoes', 'UsuarioController@solicitacoes');
Route::post('/procurarGuilda','UsuarioController@procurarGuilda');
Route::post('/solicitacoesGuildas', 'UsuarioController@solicitacoesGuildas');
Route::post('/aceitarSolicitacaoGuilda', 'UsuarioController@aceitarSolicitacaoGuilda');

Route::post('/solicitacaoGuilda','UsuarioController@solicitacaoGuilda');


Route::post('/criarPersona', 'PersonaController@criarPersona');
Route::post('/inserirPersona', 'PersonaController@inserirPersona');

Route::post('/criarGuilda', 'GuildaController@criarGuilda');
Route::post('/inserirGuilda', 'GuildaController@inserirGuilda');
Route::post('/minhasGuildas', 'GuildaController@verMinhasGuildas');
Route::post('/sairGuilda', 'GuildaController@sairGuilda');
Route::post('/home/guilda/{nome}', 'GuildaController@verPerfilGuilda');
Route::post('/home/guilda/{nome}/adicionarMembro', 'GuildaController@adicionarMembro');
Route::post('/home/guilda/{nome}/solicitacaoMembro', 'GuildaController@solicitacaoMembro');
Route::post('/home/guilda/{nome}/solicitacoesPersonas', 'GuildaController@solicitacoesPersonas');
Route::post('/home/guilda/{nome}/aceitarSolicitacaoPersona','GuildaController@aceitarSolicitacaoPersona');


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





