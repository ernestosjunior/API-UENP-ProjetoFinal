<?php

namespace App\Http\Controllers;

use  App\Http\Requests\UserLoginRequest;
use  App\Http\Requests\UserStoreRequest;
use  Illuminate\Support\Facades\Auth;
use  Illuminate\Support\Facades\Hash;

use App\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(UserLoginRequest $request)
    {
        $data = $request->validated();
        if (!Auth::attempt($data))
        {
            return response() -> json([
                "message" => "Usuário ou senha incorretos",

            ]);
        }
        $user = Auth::user();
        $acesstoken = $user->createToken('authToken')->acessToken;
        return response() -> json([
            "message" => "Usuário autenticado com sucesso", $acesstoken

        ]);
    }

    public function register(UserStoreRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        if ($user){
            $user->acessToken = $user->createToken('authToken')->acessToken;
            return response() -> json([
                "sucess" => true,
                "message" => "Usuário registrado com sucesso",
                "data" => $user

            ]);
        } 
        else {
            return response() -> json([
                "sucess" => false,
                "messagem" => "Erro ao registrar usuário",
                "data" => null
            ]);
        }
        
    }
   
}
