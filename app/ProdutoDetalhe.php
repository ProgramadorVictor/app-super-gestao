<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//RELACIONAMENTO DE 1 PARA 1, USANDO BELONGTWO E HASONE, AHO ISSO MUITO DIFERENTE. VALE A PENA DEMAIS!!
class ProdutoDetalhe extends Model
{
    protected $table = 'produto_detalhes';
    protected $fillable = ['produto_id', 'comprimento', 'largura', 'altura', 'unidade_id'];
    public function produto(){//Nome do model que estamos fazendo o relacionamento
        return $this->belongsTo('App\Produto');
        //Falando a onde o namespace do model pertence.
    }
}
