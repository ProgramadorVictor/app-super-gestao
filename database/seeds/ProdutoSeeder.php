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
        // for($i = 1; $i < (50+1); $i++){
        //     $produto = new Produto();
        //     $produto->nome = "Produto {$i}";
        //     $produto->descricao = "";
        //     $produto->peso = $i;
        //     $produto->unidade_id= [1,2,3][rand(0,2)];
        //     $produto->save();
        // }
        //Isso não tem no curso fiz, pois uso muito o php artisan migrate:fresh
        $produto = new Produto();
        $produto->nome = "Coca Cola";
        $produto->descricao = "Um refrigerante que mata a sede e você também";
        $produto->peso = 1;
        $produto->unidade_id = 1;
        $produto->save();
        $produto = new Produto();
        $produto->nome = "Pepsi";
        $produto->descricao = "Um refrigerante que mata você e sua sede.";
        $produto->peso = 1;
        $produto->unidade_id = 1;
        $produto->save();
        $produto = new Produto();
        $produto->nome = "Nuka Cola";
        $produto->descricao = "Do Fallout para o mundo.";
        $produto->peso = 1;
        $produto->unidade_id = 1;
        $produto->save();
        $produto = new Produto();
        $produto->nome = "Vodka";
        $produto->descricao = "Puro álcool";
        $produto->peso = 1;
        $produto->unidade_id = 1;
        $produto->save();
        $produto = new Produto();
        $produto->nome = "Qualquer Coisa";
        $produto->descricao = "Um bebida qualquer";
        $produto->peso = 1;
        $produto->unidade_id = 1;
        $produto->save();
    }
}