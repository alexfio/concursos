<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespostasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respostas', function (Blueprint $table) {
            $table->integer('inscricao_id');
            $table->integer('prova_id');
            
            $table->string('resposta', 255);
            $table->integer('qtd_acertos_preliminar')->nullable();
            $table->decimal('qtd_pontos_obtidos_preliminar',4,2)->nullable();
            $table->integer('qtd_acertos_definitivo')->nullable();
            $table->decimal('qtd_pontos_definitivo',4,2)->nullable();
            
            
            $table->primary(['inscricao_id', 'prova_id']);
            
            $table->foreign('inscricao_id')
                  ->references('id')
                  ->on('inscricaos')  
                  ->onUpdate('restrict') 
                  ->onDelete('restrict');
            
            $table->foreign('prova_id')
                  ->references('id')
                  ->on('prova_objetivas')  
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
        Schema::table('respostas', function(Blueprint $table) {
           $table->dropForeign(['inscricao_id']);
           $table->dropForeign(['prova_id']);
        });
        
        Schema::dropIfExists('respostas');
    }
}
