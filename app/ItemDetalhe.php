<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemDetalhe extends Model
{
    protected $table = 'produto_detalhes';
    protected $fillable = ['produto_id', 'comprimento', 'largura', 'altura', 'unidade_id'];
    public function produto(){
        return $this->belongsTo('App\Item');
    }
    //Aqui ele vai usar a mesma foreign item_id, como referência para estabekecer qual o registro é, na tabela mapeada, que é o dono de produto_detalhes
}
