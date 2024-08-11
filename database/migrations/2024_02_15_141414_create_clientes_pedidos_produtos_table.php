<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesPedidosProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 50);
            $table->timestamps();
        });
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained('clientes');
            $table->timestamps();
        });
        Schema::create('pedido_produtos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pedido_id')->constrained('pedidos');
            $table->foreignId('produto_id')->references('id')->on('produtos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('clientes');
        Schema::dropIfExists('pedidos');
        Schema::dropIfExists('pedido_produtos');
        Schema::enableForeignKeyConstraints();
    }
}
