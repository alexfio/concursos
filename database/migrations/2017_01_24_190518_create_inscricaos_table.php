<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscricaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscricaos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('concurso_id');
            $table->integer('candidato_id');
            $table->integer('cargo_id');
            $table->timestamps();
            
            $table->foreign('concurso_id')
                  ->references('id')
                  ->on('concursos')
                  ->onUpdate('restrict')  
                  ->onDelete('restrict');
                  
            
            $table->foreign('candidato_id')
                  ->references('id')
                  ->on('candidatos')
                  ->onUpdate('restrict')  
                  ->onDelete('restrict');
            
            $table->foreign('cargo_id')
                  ->references('id')
                  ->on('cargos')
                  ->onUpdate('restrict')  
                  ->onDelete('restrict');
            
            $table->unique(['concurso_id', 'candidato_id', 'cargo_id']);
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inscricaos', function(Blueprint $table) {
            $table->dropForeign(['concurso_id']);
            $table->dropForeign(['candidato_id']);
            $table->dropForeign(['cargo_id']);
        });
        
        Schema::dropIfExists('inscricaos');
    }
}
