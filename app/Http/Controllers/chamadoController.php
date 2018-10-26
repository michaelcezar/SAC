<?php

namespace App\Http\Controllers;

use App\Chamado;
use Illuminate\Http\Request;
use App\Http\Requests\ChamadoRequest;

class chamadoController extends Controller
{
    public function novoView(){
    	return view('chamadoNovo');
    }

    public function listaView(){
    	return view('chamadoListar');
    }

    public function relatorioView(){
    	return view('relatorio');
    }

    public function count(){
    	return response()->json(Chamado::All()->count());
    }

    public function listar(Request $request){
    	$chamado = new Chamado();
    	$chamado->id_pedido = $request->id_pedido;
    	$chamado->email     = $request->email;

    	return response()->json( $chamado->getChamado());
    }

    public function cadastrar(ChamadoRequest $request){
		if(Chamado::create([
			'id_pedido'   => $request->pedido_id,
			'titulo'      => $request->titulo,
			'observacoes' => $request->observacoes
		])){
			return response()->json(array("success" => "Chamado cadastrado com sucesso" ));
		} else {
			return response()->json(array("error"   => "Ocorreu um erro ao cadastrar o chamado" ));
		}
    }
}
