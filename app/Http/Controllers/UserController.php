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

    public function update()
    {
        //
    }

    public function destroy()
    {
        //
    }
}
