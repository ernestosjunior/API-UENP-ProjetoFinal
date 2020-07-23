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
Route::post('registrar','UserController@register');
Route::post('login','UserController@login');

//Rotas PESSOA
#Route::group(['middleware' => 'auth:api'], function () { 
    Route::get('consultarpessoa/{cpfcnpj}','PersonController@index');
    Route::post('cadastrarpessoa', 'PersonController@create');
    Route::put('atualizarpessoa/{cpfcnpj}','PersonController@update');
    Route::delete('excluirpessoa/{cpfcnpj}','PersonController@destroy');
#});

//Rotas DEBITOS
#Route::group(['middleware' => 'auth:api'], function () { 
    Route::get('consultardebitos/{cpfcnpj}','DebitController@index');
    Route::post('cadastrardebito', 'DebitController@create');
    Route::put('atualizardebito/{iddebit}','DebitController@update');
    Route::delete('excluirdebito/{iddebit}','DebitController@destroy');        
#});