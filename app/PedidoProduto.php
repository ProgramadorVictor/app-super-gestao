<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PedidoProduto extends Model
{
    protected $table ="pedido_produtos";

    public function pedido(){
        return $this->belongsTo('App\Pedido','pedido_id','id');
    }
}
