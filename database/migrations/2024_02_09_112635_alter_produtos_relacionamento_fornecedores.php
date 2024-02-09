<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProdutosRelacionamentoFornecedores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produtos',function (Blueprint $table){
            //Inserir um registro de fornecedores para estabelecer um relacionamento
            $fornecedor_id = DB::table('fornecedores')->insertGetId([
                'nome'=>'Fornecedor Padrão SG',
                'site' => 'fornecedorpadraosg.com.br',
                'uf' => 'SP',
                'email' => 'contato@fornecedorpadraosg.com.br',
            ]);
            $table->unsignedBigInteger('fornecedor_id')->default($fornecedor_id)->after('id');
            //Somente vai criar a coluna depois de criar a coluna id.
            //Querendo que a coluna fique a direta da coluna id, em produtos
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores'); //Foreign, constraint criada com sucesso
        });

    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
        // Schema::table('produtos',function (Blueprint $table){
        //Ou pode fazer dessa maneira
        //$table->dropForeign('produtos_forenecedor_id_foreign');
        //$table->dropColumn('fornecedor_id);
        //});
    }
}
