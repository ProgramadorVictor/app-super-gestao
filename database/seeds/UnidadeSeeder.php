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
        $opcoes = ['Bom', 'Ruim', 'Normal'];
        for($i = 0; $i < 3; $i++){
            $unidade = new Unidade();
            $unidade->unidade = $i;
            $unidade->descricao = $opcoes[$i];
            $unidade->save();
        }//Isso não tem no curso fiz, pois uso muito o php artisan migrate:fresh
    }
}
