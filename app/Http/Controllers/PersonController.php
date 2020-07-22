<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $cpfcnpj)
    {
        $pes = Person::where('cpfcnpj', $cpfcnpj)->first();
        return response()->json($pes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = $request->all();
        $res = Person::create($data);
        if ($res){

            return response() -> json([
                "sucess" => true,
                "message" => "Cadastrado com sucesso",
                "data" => $res -> id

            ]);
        } 
        else {
            return response() -> json([
                "sucess" => false,
                "messagem" => "Erro ao cadastrar",
                "data" => null
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show(Person $person)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $person)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Person $person, $idpessoa)
    {
        $dados= $request->all();
        $per = Person::find($idpessoa);
        $update = $per->update($dados);
        if ($update){

            return response() -> json([
                "sucess" => true,
                "message" => "Dados da pessoa atualizados com sucesso",
                "data" => null

            ]);
        } 
        else {
            return response() -> json([
                "sucess" => false,
                "message" => "Erro ao atualizar dados",
                "data" => null
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $idusuario)
    {
        $usuario = User::find($idusuario);
        $res = $usuario->delete();
        if ($res){

            return response() -> json([
                "sucess" => true,
                "message" => "Usuário deletado com sucesso",
                "data" => null

            ]);
        } 
        else {
            return response() -> json([
                "sucess" => false,
                "messagem" => "Erro ao deletar usuário",
                "data" => null
            ]);
        }
    }
}
