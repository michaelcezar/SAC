<?php

namespace App\Http\Controllers;

use App\Pedido;
use Illuminate\Http\Request;
use App\Http\Requests\PedidoRequest;

class pedidoController extends Controller
{
    public function novoView(){
    	return view('pedidoNovo');
    }

    public function listaView(){
    	return view('pedidoListar');
    }

    public function count(){
        return response()->json(Pedido::All()->count());
    }

    public function listar(){
    	return response()->json(Pedido::getPedido());
    }

     public function cadastrar(PedidoRequest $request){
        if(Pedido::create([
            'id_cliente' => $request->cliente_id,
            'item'       => $request->item
        ])){
            return response()->json(array("success" => "Pedido cadastrado com sucesso" ));
        } else {
            return response()->json(array("error"   => "Ocorreu um erro ao cadastrar o pedido" ));
        }
    }

    public function verificar(Request $request){
    	$validatedData = $request->validate([
            'id' => 'required|numeric',
        ]);
    	$pedido = new Pedido();
    	$pedido->id = $request->id;
    	
    	$ret = $pedido->getPedidoId();

    	if ( sizeof($ret) == 0 ){
    		return response()->json(array("error"   => "Pedido não localizado" ));
    	} else {
    		return response()->json(array("success" => $ret ));
    	}
    }
}
