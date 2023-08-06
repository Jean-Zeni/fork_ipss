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
        Schema::table('membros', function (Blueprint $table) {
            $table->text('descricao')->nullable();
            $table->string('facebook', 255)->nullable();
            $table->string('instagram', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('membros', function(Blueprint $table){
            $table->dropColumn('descricao');
            $table->dropColumn('facebook');
            $table->dropColumn('instagram');
        });
    }
};
