<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Pedido extends Model
{

	protected $fillable = [
        'item', 'id_cliente',
    ];

    public static function getPedido(){
    	return DB::table('pedidos as p')
            ->leftJoin('clientes as c', 'c.id', '=', 'p.id_cliente')
            ->select('p.id','p.item','p.created_at','c.nome','c.email')
            ->get();
    }
    public  function getPedidoId(){
    	$id   = $this->id;

    	$pedido =  DB::table('pedidos as p')
            ->leftJoin('clientes as c', 'c.id', '=', 'p.id_cliente')
            ->select('p.id','p.item','p.created_at','c.nome','c.email')
			->when($id, function ($query, $id) {
                return $query->where('p.id',  '=', $id);
            })
            ->get();
        return $pedido;
    }
}
