<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        // $fornecedor = new Fornecedor; //Instanciando
        // $fornecedor->nome = 'Fornecedor 100';
        // $fornecedor->site = 'fornecedor100.com.br';
        // $fornecedor->uf = 'CE';
        // $fornecedor->email = 'contato@fornecedor100@.con.br';
        // $fornecedor->save();

        // //Atenção para o método fillable da classe. Configure o método lá
        // Fornecedor::create([
        //     'nome' => 'Fornecedor 200',
        //     'site' => 'fornecedor200.com.br',
        //     'uf' => 'CE',
        //     'email' => 'contato@fornecedor200@.con.br'
        // ]);

        // //insert
        // DB::table('fornecedores')->insert([
        //     'nome' => 'Fornecedor 300',
        //     'site' => 'fornecedor300.com.br',
        //     'uf' => 'SP',
        //     'email' => 'contato@fornecedor300@.con.br'
        // ]);

        //SEEDER CRIADO POR MIM
        //MELHOR COMANDO PARA APAGAR E FAZER OS REGISTROS DE NOVO E ALIMENTAR O BANCO DE DADOS. 'php artisan migrate:refresh --seed'
        $numero = 0;
        for($i = 0; $i < 50; $i++){
            $fornecedor = new Fornecedor();
            $numero += 100;
            $fornecedor->nome = "Fornecedor {$numero}";
            $fornecedor->site = "http://www.fornecedor{$numero}.com.br";
            $fornecedor->uf = ['SP','RJ','ES','RS','BA','MG'][rand(0,5)];
            $fornecedor->email = "contato@fornecedor{$numero}.com.br";
            $fornecedor->save();
        }
    }
}
