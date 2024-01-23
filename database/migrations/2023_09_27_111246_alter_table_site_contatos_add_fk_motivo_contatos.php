<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableSiteContatosAddFkMotivoContatos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->unsignedBigInteger('motivo_contatos_id'); //Relacionamento entre banco de dados
        });

        DB::statement('update site_contatos set motivo_contatos_id = motivo_contato');
        //Pegando todos os dados contidos em motivo_contato e atribuindo a motivo_contatos_id que é uma coluna da tabela site_contatos

        Schema::table('site_contatos', function (Blueprint $table) {
            $table->foreign('motivo_contatos_id')->references('id')->on('motivo_contatos'); //motivos_contatos_id apontando para a coluna id da tabela motivo_contatos e por fim remover a coluna motivo_contato
            $table->dropColumn('motivo_contato'); //Não existe mais
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->integer('motivo_contato');
            $table->dropForeign('site_contatos_motivo_contatos_id_foreign');
        });
        DB::statement('update site_contatos set motivo_contato = motivo_contatos_id');
        //Pegando a motivo_contatos_id e atribuindo para motivo_contato
        
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->dropColumn('motivo_contatos_id');
        });
        //Esses comandos abaixo dropam a tabela por completo, não fazendo sentido.
        // Schema::dropIfExists('site_contatos');    
        // Schema::dropIfExists('motivo_contatos');    
    }
}
