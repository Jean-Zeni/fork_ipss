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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('titulo', 256);
            $table->date('data_inicio');
            $table->date('data_fim');
            $table->string('tipo_documento', 2);
            $table->string('link', 256)->nullable();
            $table->char('tipo_posicao', 3);
            $table->smallInteger('ordem');
            $table->boolean('ativo')->default(0);
            $table->boolean('nova_guia')->default(0);

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banners');
    }
};
