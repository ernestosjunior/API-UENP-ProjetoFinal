<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Rotas USUARIO

Route::post('cadastrarusuario', 'UserController@create');
Route::put('atualizarusuario/{idusuario}','UserController@update');
Route::delete('excluirusuario/{idusuario}','UserController@destroy');

//Rotas PESSOA
Route::get('consultarpessoa/{cpfcnpj}','PersonController@index');
Route::post('cadastrarpessoa', 'PersonController@create');
Route::put('atualizarpessoa/{idpessoa}','PersonController@update');
Route::delete('excluirpessoa/{idpessoa}','PersonController@destroy');

//Rotas DEBITOS
Route::get('consultardebitos/{idpessoa}','DebitController@index');
Route::post('cadastrardebito', 'DebitController@create');
Route::put('atualizardebito/{iddebit}','DebitController@update');
Route::delete('excluirdebito/{iddebit}','DebitController@destroy');