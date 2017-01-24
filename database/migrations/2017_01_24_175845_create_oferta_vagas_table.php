<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfertaVagasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oferta_vagas', function (Blueprint $table) {
            
            $table->integer('concurso_id');
            $table->integer('cargo_id');
            $table->integer('vagas_ampla_concorrencia');
            $table->integer('vagas_pcd');
            $table->integer('qtd_aprovados_ampla_concorrencia');
            $table->integer('qtd_aprovados_pcd');
            
            $table->primary(['concurso_id', 'cargo_id']);
            
            $table->foreign('concurso_id')
                  ->references('id')
                  ->on('concursos')
                  ->onUpdate('restrict')  
                  ->onDelete('restrict');
            
            $table->foreign('cargo_id')
                  ->references('id')
                  ->on('cargos')
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
        Schema::table('oferta_vagas', function(Blueprint $table){
            $table->dropForeign(['concurso_id']);
            $table->dropForeign(['cargo_id']);
        });
        Schema::dropIfExists('oferta_vagas'); 
    }
}
