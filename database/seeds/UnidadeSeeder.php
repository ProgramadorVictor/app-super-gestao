<?php

use Illuminate\Database\Seeder;
use App\Unidade;

class UnidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $opcoes = ['Unidade'];
        for($i = 0; $i < count($opcoes); $i++){
            $unidade = new Unidade();
            $unidade->unidade = ['UN','JP','US'][rand(0,2)];
            $unidade->descricao = $opcoes[$i];
            $unidade->save();
        }//Isso não tem no curso fiz, pois uso muito o php artisan migrate:fresh
    }
}
