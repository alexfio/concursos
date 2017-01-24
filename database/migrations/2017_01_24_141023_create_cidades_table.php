<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cidades', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('estado_id');
            $table->string('nome');
            
            $table->foreign('estado_id')
                  ->references('id')
                  ->on('estados')
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
    
        Schema::table('cidades', function(Blueprint $table) {
            $table->dropForeign(['estado_id']);
        });
        
        Schema::dropIfExists('cidades');
    }
}
