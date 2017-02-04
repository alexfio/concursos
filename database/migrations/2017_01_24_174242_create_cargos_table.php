<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCargosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->integer('concurso_id');
            $table->integer('vagas_ampla_concorrencia');
            $table->integer('vagas_pcd');
            $table->integer('qtd_aprovados_ampla_concorrencia');
            $table->integer('qtd_aprovados_pcd');
            
            $table->foreign('concurso_id')
                  ->references('id')
                  ->on('concursos')
                  ->onUpdate('restrict')  
                  ->onDelete('restrict');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cargos', function(Blueprint $table) {
           $table->dropForeign(['concurso_id']); 
        });
        
        Schema::dropIfExists('cargos');
    }
}
