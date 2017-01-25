<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultados', function (Blueprint $table) {
            $table->integer('inscricao_id');
            $table->integer('qtd_total_acertos_preliminar');
            $table->decimal('qtd_total_pontos_obtidos_preliminar',4,2);
            $table->integer('qtd_total_acertos_definitivo')->nullable();
            $table->decimal('qtd_total_pontos_definitivo',4,2)->nullable();
            $table->integer('posicao_preliminar')->nullable();
            $table->integer('posicao_definitivo')->nullable();
            
            $table->primary('inscricao_id');
            
            $table->foreign('inscricao_id')
                  ->references('id')  
                  ->on('inscricaos')
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
        Schema::table('resultados', function(Blueprint $table){
            $table->dropForeign(['inscricao_id']);
        });
        Schema::dropIfExists('resultados');
    }
}
