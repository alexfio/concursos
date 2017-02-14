<?php

use Illuminate\Database\Seeder;
use Concursos\Model\SituacaoConcurso;

class SituacoesConcursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $s1 = new SituacaoConcurso();
        $s1->nome = "Em Definição";
        $s1->descricao = "Concurso encontra-se na fase de definição";
        $s1->save();
        
        $s1 = new SituacaoConcurso();
        $s1->nome = "Inscrições Abertas";
        $s1->descricao = "Concurso encontra-se na fase de preechimento de inscrições";
        $s1->save();
        
        $s1 = new SituacaoConcurso();
        $s1->nome = "Em Andamento";
        $s1->descricao = "Inscrições Encerradas. Concurso em Andamento";
        $s1->save();
        
        $s1 = new SituacaoConcurso();
        $s1->nome = "Encerrado";
        $s1->descricao = "Concurso Encerrado. Resultado Divulgado";
        $s1->save();
        
    }
}
