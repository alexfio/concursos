<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampoSexoNaTabelaCandidato extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('candidatos', function(Blueprint $table) {
            $table->integer('sexo_id');
            $table->foreign('sexo_id')
                  ->references('id')
                  ->on('sexos')
                  ->onDelete('restrict')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('candidatos', function(Blueprint $table){
           $table->dropForeign(['sexo_id']);
           $table->dropColumn('sexo_id');
        });
    } 
}
