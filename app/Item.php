<?php
//É bom usarmos o nome da model, como uma função
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use SoftDeletes;
    protected $table = 'produtos';
    protected $fillable = ['nome','descricao','peso','unidade_id','fornecedor_id'];
    public function itemDetalhe(){ //produto_id é a foreign de ItemDetalhe
        return $this->hasOne('App\ItemDetalhe','produto_id','id'); //, 'Aqui passamos o nome da coluna que guarda a foreign' e o terceiro parametro 'É a chave primaria normalmente é id'
    } //Relacionamento de 1 para 1.
    //La em ItemDetalhe ele vai procurar uma foreign que seja item_id
    public function rel2(){ //Só para dar um exemplo para eu fazer anotações
    }
    public function rel3(){ //Só para dar um exemplo para eu fazer anotações
    }
    public function fornecedor(){
        return $this->belongsTo('App\Fornecedor','fornecedor_id','id'); //Um produto pertecen a  fornecedor.
    } //Relacionamento de 1 para N.
    public function pedidos(){
        return $this->belongsToMany("App\Pedido", "pedidos_produtos", "produto_id", "pedido_id");
    } 
}
//OBS: Model 'Item' que mapeia a tabela 'produtos' tem '($this->hasOne)' que é um item detalhe que mapeia a tabela 'produtos_detalhes' e o relacionamento é em 'produto_detalhes' a foreign é a coluna produto_id
//E encaminhamos a coluna id da tabela 'produtos' para estabelecermos um relacionamento em Item e ItemDetalhe.