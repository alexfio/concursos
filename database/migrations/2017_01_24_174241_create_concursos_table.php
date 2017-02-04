<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConcursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concursos', function (Blueprint $table) {
            $table->increments('id');
            $table->text('descricao');
            $table->string('edital');
            $table->date('data_inicio_inscricoes');
            $table->date('data_termino_inscricoes');
            $table->boolean('zerar_alguma_prova_elimina_candidato')->default(true);
            $table->integer('situacao_concurso_id');
            $table->timestamps();
            
            $table->foreign('situacao_concurso_id')
                  ->references('id')
                  ->on('situacao_concursos')
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
        Schema::table('concursos', function(Blueprint $table) {
            $table->dropForeign(['situacao_concurso_id']);
        });
        
        Schema::dropIfExists('concursos');
    }
}
