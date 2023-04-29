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
        Schema::table('arquivos', function (Blueprint $table) {

            //relacionamento um para um
            $table->unsignedBigInteger('foto_id')->nullable();

            //constraint
            $table->foreign('foto_id')->references('id')->on('fotos')->onDelete('cascade');
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
        Schema::table('arquivos', function(Blueprint $table){
            //remover a foreignKey
            $table->dropForeign('arquivos_foto_id_foreign');
            //remover a coluna unidade_id
            $table->dropColumn('foto_id');
        });
    }
};
