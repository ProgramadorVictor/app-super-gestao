<?php
//É bom usarmos o nome da model, como uma função
namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemDetalhe extends Model
{
    //Depois tentar aplicar isso em outras aplicações minha, para eu possa enteder.
    protected $table = 'produto_detalhes';
    protected $fillable = ['produto_id', 'comprimento', 'largura', 'altura', 'unidade_id'];
    public function item(){ //É bom usarmos o nome da model, como uma função
        return $this->belongsTo('App\Item', 'produto_id','id');
        //Esses parametros são necessários porque, precisamos indicar qual a foreign, que está na tabela 'produto_detalhes' que referenciar a qual coluna da outra tabela, no caso é a 'id'
        //Na outra tabela a mesma forma, precisamos indicar com hasOne qual coluna é de outra tabela e qual ela esta referenciando
    }
    //Aqui ele vai usar a mesma foreign item_id, como referência para estabekecer qual o registro é, na tabela mapeada, que é o dono de produto_detalhes
}
