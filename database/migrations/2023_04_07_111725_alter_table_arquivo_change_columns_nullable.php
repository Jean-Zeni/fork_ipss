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
            $table->string('tipo_mime', 100)->nullable()->change();
            $table->decimal('tamanho', 10)->nullable()->change();
            $table->string('nome_original', 100)->nullable()->change();
            $table->string('legenda', 255)->nullable()->change();
            $table->integer('posicao')->nullable()->change();
            $table->date('data_publicacao')->nullable()->change();
            $table->string('tipo', 2)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      
    }
};
