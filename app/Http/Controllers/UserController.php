<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        //
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $res = User::create($data);
        if ($res){

            return response() -> json([
                "sucess" => true,
                "message" => "Usuário cadastrado com sucesso",
                "data" => $res -> id

            ]);
        } 
        else {
            return response() -> json([
                "sucess" => false,
                "messagem" => "Erro ao cadastrar usuário",
                "data" => null
            ]);
        }
    }

    public function update(Request $request, $idusuario)
    {
        $dados= $request->all();
        $us = User::find($idusuario);
        $update = $us->update($dados);
        if ($update){

            return response() -> json([
                "sucess" => true,
                "message" => "Dados do usuário atualizados com sucesso",
                "data" => null

            ]);
        } 
        else {
            return response() -> json([
                "sucess" => false,
                "message" => "Erro ao atualizar dados do usuário",
                "data" => null
            ]);
        }
    }

    public function destroy()
    {
        $pers = Person::find($idpessoa);
        $res = $pers->delete();
        if ($res){

            return response() -> json([
                "sucess" => true,
                "message" => "Pessoa e débito(s) deletados com sucesso",
                "data" => null

            ]);
        } 
        else {
            return response() -> json([
                "sucess" => false,
                "messagem" => "Erro ao deletar os dados",
                "data" => null
            ]);
        }
    }
}
