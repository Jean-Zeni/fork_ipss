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
        Schema::create('igrejas', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 256);
            $table->string('resumo', 512)->nullable();
            $table->string('endereco', 256)->nullable();
            $table->string('link_site', 256)->nullable();
            $table->string('latitude', 115)->nullable();
            $table->string('longitude', 115)->nullable();
            $table->boolean('ativo')->nullable()->default(0);
            $table->boolean('igreja_sapucaia')->nullable()->default(0);
            $table->boolean('congregacao')->nullable()->default(0);
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
        Schema::dropIfExists('igrejas');
    }
};
