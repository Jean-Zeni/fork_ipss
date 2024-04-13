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
            $table->unsignedBigInteger('igreja_id')->nullable();

            $table->foreign('igreja_id')->references('id')->on('igrejas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('arquivos', function(Blueprint $table){
        
            $table->dropForeign('arquivos_igreja_id_foreign');
         
            $table->dropColumn('igreja_id');
        });
    }
};
