<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'produtos';
    protected $fillable = ['nome','descricao','peso','unidade_id'];
    public function produtoDetalhe(){ //produto_id é a foreign de ItemDetalhe
        return $this->hasOne('App\ItemDetalhe','produto_id','id'); //, 'Aqui passamos o nome da coluna que guarda a foreign' e o terceiro parametro 'É a chave primaria normalmente é id'
    }
    //La em ItemDetalhe ele vai procurar uma foreign que seja item_id
}
//OBS: Model 'Item' que mapeia a tabela 'produtos' tem '($this->hasOne)' que é um item detalhe que mapeia a tabela 'produtos_detalhes' e o relacionamento é em 'produto_detalhes' a foreign é a coluna produto_id
//E encaminhamos a coluna id da tabela 'produtos' para estabelecermos um relacionamento em Item e ItemDetalhe.