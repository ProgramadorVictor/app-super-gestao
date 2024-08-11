<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(FornecedorSeeder::class);
        $this->call(MotivoContatoSeeder::class);
        $this->call(SiteContatoSeeder::class);
        // $this->call(SiteContatoSeeder::class);
        // $this->call(UserSeeder::class); //Seeder que eu criei não aparece no curso.
        //A seed tem que ser chamada aqui, para funcionar com o comando 'php artisan db:seed'
        $this->call(UnidadeSeeder::class);
        $this->call(ProdutoSeeder::class);
        $this->call(ClientePedidoProdutoSeeder::class);
        

        factory(User::class, 10)->create(); //Aqui é uma factory que podemos usar para alimentar o banco de dados.
    }
}
