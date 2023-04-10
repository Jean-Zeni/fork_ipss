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
        Schema::create('arquivos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('arquivo', 100);
            $table->string('tipo_mime', 100);
            $table->decimal('tamanho', 10);
            $table->string('nome_original', 100);
            $table->string('legenda', 255);
            $table->integer('posicao');
            $table->date('data_publicacao');
            $table->string('tipo', 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arquivos');
    }
};
