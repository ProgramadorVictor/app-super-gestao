<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteContatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_contatos', function (Blueprint $table) {
            $table->id('id')->autoIncrement()->unique();
            $table->timestamps();
            $table->string('nome',50)->nullable();
            $table->string('telefone',20)->nullable();
            $table->string('email',80)->nullable();
            $table->integer('motivo_contato')->nullable();
            $table->text('mensagem')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_contatos');
    }
}
