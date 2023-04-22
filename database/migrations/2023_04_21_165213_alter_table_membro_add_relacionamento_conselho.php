<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('membros', function (Blueprint $table) {

            //relacionamento um para um
            $table->unsignedBigInteger('conselho_id')->nullable();

            //constraint
            $table->foreign('conselho_id')->references('id')->on('conselhos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         //remover o relacionamento com a tabela produtos
         Schema::table('membros', function(Blueprint $table){
            //remover a foreignKey
            $table->dropForeign('membros_conselho_id_foreign');
            //remover a coluna unidade_id
            $table->dropColumn('conselho_id');
        });
    }
};
