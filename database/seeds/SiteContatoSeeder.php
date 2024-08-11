<?php

use Illuminate\Database\Seeder;
use App\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /*
        DB::table('site_contatos')->insert([
            'nome' => 'Sistemas SG',
            'telefone' => '(11) 99999-8888',
            'email' => 'contato@sg.com.br',
            'motivo_contatos_id' => 1,
            'mensagem' => 'Seja bem-vindo ao sistema Super Gestão',
        ]);*/
        

        factory(SiteContato::class, 10)->create(); //
    }
}
