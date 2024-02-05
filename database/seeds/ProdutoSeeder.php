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
    }
}
