<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvaObjetivasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prova_objetivas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('concurso_id');
            $table->integer('cargo_id');
            $table->integer('disciplina_id');
            $table->decimal('pontos_por_questao',3,2)->default(1);
            $table->integer('qtd_questoes');
            $table->integer('numero_primeira_questao');
            $table->string('gabarito_preliminar', 255);
            $table->string('gabarito_definitivo', 255);
            $table->timestamps();
            
            $table->unique(['concurso_id', 'cargo_id', 'disciplina_id']);
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
        Schema::table('prova_objetivas', function(Blueprint $table) {
            $table->dropForeign(['concurso_id']);
            $table->dropForeign(['cargo_id']);
            $table->dropForeign(['disciplina_id']);
        });
        Schema::dropIfExists('prova_objetivas');
    }
}
