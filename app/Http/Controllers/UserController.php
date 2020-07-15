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
        $user = Auth::user(); //Recuperando o usuário autenticado
        $accessToken = $user->createToken('authToken')->accessToken;
        return response() -> json([
            "message" => "Usuário autenticado com sucesso", $accessToken

        ]);
    }

    public function register(UserStoreRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']); //Criptografia
        $user = User::create($data);
        if ($user){
            $user->accessToken = $user->createToken('authToken')->accessToken;
            return response() -> json([
                "sucess" => true,
                "message" => "Usuário registrado com sucesso", $user

            ]);
        } 
        else {
            return response() -> json([
                "sucess" => false,
                "messagem" => "Erro ao registrar usuário",
            ]);
        }
        
    }
   
}
