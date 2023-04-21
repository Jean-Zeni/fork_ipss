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
        Schema::create('membros', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 256);
            $table->string('email', 256)->nullable();
            $table->string('telefone', 18)->nullable();
            $table->string('funcao', 256)->nullable();
            $table->string('resumo', 512)->nullable();
            $table->smallInteger('ordem');
            $table->boolean('ativo')->nullable()->default(0);
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
        Schema::dropIfExists('membros');
    }
};
