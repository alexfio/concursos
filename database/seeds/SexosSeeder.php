<?php

use Illuminate\Database\Seeder;
use Concursos\Model\Sexo;

class SexosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $masculino = new Sexo();
        $masculino->sigla = "M";
        $masculino->nome = "Masculino";
        $masculino->save();
      
        $feminino = new Sexo();
        $feminino->sigla = "F";
        $feminino->nome = "Feminino";
        $feminino->save();
    }
}
