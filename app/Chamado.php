<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Chamado extends Model
{
	protected $fillable = [
        'titulo', 'observacoes', 'id_cliente', 'id_pedido',
    ];

    public function getChamado(){
        $id_pedido = $this->id_pedido;
        $email     = $this->email;

    	$chamado = DB::table('chamados as ch')
    		->leftJoin('pedidos as p', 'p.id', '=', 'ch.id_pedido')
            ->leftJoin('clientes as c', 'c.id', '=', 'p.id_cliente')
            ->select('ch.titulo', 'ch.observacoes', 'p.id as numPedido', 'p.item', 'ch.created_at','c.nome','c.email')
             ->when($id_pedido, function ($query, $id_pedido) {
                return $query->where('ch.id_pedido', '=',  $id_pedido);
            })
            ->when($email, function ($query, $email) {
                return $query->where('c.email', '=',  $email);
            })
            ->get();
        return $chamado;
    }
}
