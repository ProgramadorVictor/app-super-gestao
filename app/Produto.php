<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//RELACIONAMENTO DE 1 PARA 1, USANDO BELONGTWO E HASONE, AHO ISSO MUITO DIFERENTE, ACREDITO QUE NÃO VALE A PENA

class Produto extends Model
{
    //
    protected $fillable = ['nome','descricao','peso','unidade_id'];

    //Não entendi muito bem isso aqui não estudar melhor pra ver se entendo
    public function produtoDetalhe(){
        //O proprio produo $this.
        //O hasOne fala que tem um único produto indicando a ele
        return $this->hasOne('App\ProdutoDetalhe');
        //Pelo que tinha entendidom, aqui a gebte diz que nessa model, que referencia uma tabela, ela esta dizendo que uma coluna daqui pertence a coluna de outra tabela,
        //E o Laravel entende que a foreign, na tabela aqui, é a que é de fora. assim podemos acessar os dados de uma forma melhor, entranando nessa tabela, chamando a tabela de outra
        //E assim entrando nos atributos dessa tabela estando em outra tabela
        //Produto(tabela)->ProdutoDetalhe(Outra tabela)->Acessando->comprimento, acessando a tabela e outra tabela e o comprimento ad segunda tabela
    }
    //Produto tem 1 ProdutoDetalhe
    //Ele entende que 1 registro relacionado em produto_detalhes, com base na foreign. sendo aqui a produto_id
    //O parametro vem de produto (pk), do porprio produto, id.
}
