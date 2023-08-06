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
        Schema::create('noticias', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 256);
            $table->string('resumo', 512)->nullable();
            $table->string('autor', 256)->nullable();
            $table->text('descricao')->nullable();
            $table->dateTime('data_publicacao')->nullable();
            $table->boolean('ativo')->nullable()->default(0);
            $table->boolean('destaque')->nullable()->default(0);
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
        Schema::dropIfExists('noticias');
    }
};
