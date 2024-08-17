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
        Schema::create('reflexoes', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 256);
            $table->string('resumo', 512)->nullable();
            $table->text('descricao')->nullable();
            $table->unsignedBigInteger('membro_id')->nullable();
            $table->foreign('membro_id')->references('id')->on('membros')->onDelete('cascade');
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
        Schema::dropIfExists('reflexoes');
    }
};
