<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = "clientes";
    protected $fillable = ['nome'];

    public function pedido(){
        return $this->hasMany('App\Pedido','cliente_id','id');
    }
}
