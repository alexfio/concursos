<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidatos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->date('nascimento');
            $table->string('email');
            $table->string('telefone_residencial', 15);
            $table->string('telefone_celular', 15);
            $table->string('cpf',11);
            $table->string('rg', 20);
            $table->string('rg_org_exp', 10);
            $table->integer('rg_uf');
            $table->integer('cidade_id');
            $table->integer('tipo_logradouro_id');
            $table->string('logradouro', 255);
            $table->string('numero', 10);
            $table->string('cep', 50);
            $table->string('bairro', 100);
            $table->timestamps();
            
            $table->foreign('rg_uf')
                  ->references('id')      
                  ->on('estados')  
                  ->onUpdate('restrict')
                  ->onDelete('restrict');
            
            $table->foreign('cidade_id')
                  ->references('id')      
                  ->on('cidades')  
                  ->onUpdate('restrict')
                  ->onDelete('restrict');
            
            $table->foreign('tipo_logradouro_id')
                  ->references('id')      
                  ->on('tipo_logradouros')  
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
        Schema::table('candidatos', function(Blueprint $table) {
           $table->dropForeign(['rg_uf']); 
           $table->dropForeign(['cidade_id']); 
           $table->dropForeign(['tipo_logradouro_id']); 
           
           
        });
        Schema::dropIfExists('candidatos');
    }
}
