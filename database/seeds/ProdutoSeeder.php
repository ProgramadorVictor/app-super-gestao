<?php

use Illuminate\Database\Seeder;
use App\Produto;
use App\Fornecedor;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fornecedores = Fornecedor::all();
        $tamanho = $fornecedores->count();
        $produtos = [
            [
                'nome' => 'Cola',
                'descricao' => 'Usado normalmente para colar',
            ],
            [
                'nome' => 'Refrigerante',
                'descricao' => 'Um refrigerante',
            ],
            [
                'nome' => 'Computador',
                'descricao' => 'Um computador',
            ],
            [
                'nome' => 'Vodka',
                'descricao' => 'Puro álcool',
            ],
            [
                'nome' => 'Jogo',
                'descricao' => 'Uma jogo qualquer',
            ],
            [
                'nome' => 'Série',
                'descricao' => 'Uma série qualquer',
            ],
        ];
        foreach($produtos as $produto){
            Produto::create(['nome' => $produto['nome'] , 'descricao' =>$produto['descricao'], 'peso' => rand(1,2), 'unidade_id' => 1, 'fornecedor_id' => rand(1, $tamanho)]);
        }
    }
}