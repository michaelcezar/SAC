<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;
use App\Http\Requests\ClienteRequest;
use App\Http\Requests\AtualizarEmailRequest;

class clienteController extends Controller
{
    public function novoView(){
    	return view('clienteNovo');
    }

    public function listaView(){
    	return view('clienteListar');
    }

    public function count(){
        return response()->json(Cliente::All()->count());
    }

    public function listar(){
		return response()->json(Cliente::All());
    }

    public function cadastrar(ClienteRequest $request){
		if(Cliente::create([
			'nome'        => $request->nome,
			'email'       => $request->email
		])){
			return response()->json(array("success" => "Cliente cadastrado com sucesso" ));
		} else {
			return response()->json(array("error"   => "Ocorreu um erro ao cadastrar o cliente" ));
		}
    }

    public function atualizarEmail(AtualizarEmailRequest $request){
        $cliente        = Cliente::find($request->id);
        $cliente->email = $request->email;
        $cliente->save();
        return response()->json(array("success" =>  "E-mail do cliente atualizado com sucesso" ));
    }

    
}
