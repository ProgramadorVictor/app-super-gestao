<?php

use Illuminate\Database\Seeder;
use App\Produto;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $produtos = [
            [
                'nome' => 'Coca Cola',
                'descricao' => 'Um refrigerante que mata a sede e você também',
            ],
            [
                'nome' => 'Pepsi',
                'descricao' => 'Um refrigerante que mata você e sua sede.',
            ],
            [
                'nome' => 'Nuka Cola',
                'descricao' => 'Do Fallout para o mundo.',
            ],
            [
                'nome' => 'Vodka',
                'descricao' => 'Puro álcool',
            ],
            [
                'nome' => 'Qualquer Coisa',
                'descricao' => 'Uma bebida qualquer',
            ],
        ];
        foreach($produtos as $produto){
            Produto::create(['nome' => $produto['nome'] , 'descricao' =>$produto['descricao'], 'peso' => rand(1,2), 'unidade_id' => 1]);
        }
    }
}