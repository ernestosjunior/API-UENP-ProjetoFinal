<?php

namespace App\Http\Controllers;

use App\Person;
use App\Debit;
use Illuminate\Http\Request;

class DebitController extends Controller
{
    public function index(Request $request, $idpessoa)
    {
        $debts = Person::with('Debits')->FindOrFail($idpessoa);
        return response()->json($debts);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = $request->all();
        $res = Debit::create($data);
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
                "message" => "Erro ao cadastrar",
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
     * @param  \App\Debit  $debit
     * @return \Illuminate\Http\Response
     */
    public function show(Debit $debit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Debit  $debit
     * @return \Illuminate\Http\Response
     */
    public function edit(Debit $debit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Debit  $debit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Debit $debit, $iddebit)
    {
        $datadeb = $request->all();
        $debito = Debit::find($iddebit);
        $update = $debito->update($datadeb);
        if ($update){

            return response() -> json([
                "sucess" => true,
                "message" => "Débito atualizado com sucesso",
                "data" => null

            ]);
        } 
        else {
            return response() -> json([
                "sucess" => false,
                "message" => "Erro ao atualizar débito",
                "data" => null
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Debit  $debit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Debit $debit, $iddebit)
    {
        $deb = Debit::find($iddebit);
        $exc = $deb->delete();
        if ($exc){

            return response() -> json([
                "sucess" => true,
                "message" => "Débito excluído com sucesso",
                "data" => null

            ]);
        } 
        else {
            return response() -> json([
                "sucess" => false,
                "message" => "Erro ao excluir débito",
                "data" => null
            ]);
        }
        
    }
   
}
