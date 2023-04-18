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
        Schema::create('contatos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 150);
            $table->string('endereco', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('telefone', 15)->nullable();
            $table->text('mensagem')->nullable();
            $table->text('resposta')->nullable();
            $table->boolean('ativo')->nullable()->default(0);
            $table->dateTime('data_resposta')->nullable();
            $table->smallInteger('status')->nullable();
            $table->smallInteger('tipo')->nullable();
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
        Schema::dropIfExists('contatos');
    }
};
