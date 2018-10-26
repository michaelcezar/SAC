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
    return view('inicio');
});

Route::prefix('cliente')->group(function () {
	Route::get('novo'       , 'clienteController@novoView');
	Route::get('listar'     , 'clienteController@listaView');
	Route::get('count'      , 'clienteController@count');
	Route::post('cadastrar' , 'clienteController@cadastrar');
	Route::post('listar'    , 'clienteController@listar');
	Route::post('pesquisar' , 'clienteController@pesquisar');
	Route::put('atualizar'  , 'clienteController@atualizarEmail');
});

Route::prefix('pedido')->group(function () {
	Route::get('novo'       , 'pedidoController@novoView');
	Route::get('listar'     , 'pedidoController@listaView');
	Route::get('count'      , 'pedidoController@count');
	Route::post('cadastrar' , 'pedidoController@cadastrar');
	Route::post('listar'    , 'pedidoController@listar');
	Route::post('verificar' , 'pedidoController@verificar');
});

Route::prefix('chamado')->group(function () {
	Route::get('novo'       , 'chamadoController@novoView');
	Route::get('listar'     , 'chamadoController@listaView');
	Route::get('count'      , 'chamadoController@count');
	Route::get('relatorio'  , 'chamadoController@relatorioView');
	Route::post('cadastrar' , 'chamadoController@cadastrar');
	Route::post('listar'    , 'chamadoController@listar');
	Route::post('relatorio' , 'chamadoController@listar');
});