<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table ="pedidos";
    protected $fillable = ['cliente_id'];
    public function cliente(){
        return $this->belongsTo("App\Cliente", "cliente_id", "id");
    }
    public function produtos(){
        return $this->belongsToMany("App\Item", "pedido_produtos", "pedido_id", "produto_id");
    }
    //1 modelo de relacionamento de nxn em relação ao modelo que estamos implementando, basicamente é o onde estamos entrando para acessar os dados
    //2 é a tabela que faz o relacionamento nxn, a tabela pivot que guarda as foreign.
    //3 é a foreign do modelo atual no caso Pedido no qual referencia o id da tabela pedidos
    //4 é a foreign do primeiro moodelo, no caso App\Item no qual referencia o id da tabela produtos
}
