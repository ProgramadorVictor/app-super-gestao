<?php

use Illuminate\Database\Seeder;
use App\Pedido;
use App\Cliente;
use App\PedidoProduto;
use App\Produto;

class ClientePedidoProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clientes = [
            ['nome' => 'Ana Silva'],
            ['nome' => 'Carlos Oliveira'],
            ['nome' => 'Fernanda Souza'],
            ['nome' => 'Jorge Santos'],
            ['nome' => 'Mariana Costa'],
            ['nome' => 'Roberto Lima'],
            ['nome' => 'Tatiane Pereira'],
            ['nome' => 'Vinícius Martins'],
            ['nome' => 'Juliana Almeida'],
            ['nome' => 'Paulo Rodrigues'],
        ];
        Cliente::insert($clientes);
        $tamanho = count($clientes);
        $pedidos = [];
        for ($i = 0; $i < $tamanho; $i++) {
            $pedidos[$i] = [
                'cliente_id' => rand(1, $tamanho)
            ];
        }
        $produtos = Produto::all()->count();
        Pedido::insert($pedidos);
        for ($i = 0; $i < $tamanho; $i++) {
            $pedido_produtos[$i] = [
                'pedido_id' => rand(1, $tamanho),
                'produto_id' => rand(1, $produtos)
            ];
        }
        PedidoProduto::insert($pedido_produtos);
    }
}
