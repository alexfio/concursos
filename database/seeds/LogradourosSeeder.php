<?php

use Illuminate\Database\Seeder;
use Concursos\Model\TipoLogradouro;

class LogradourosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $logradouros = [];
        $logradouros[0]['sigla'] = 'AL';
        $logradouros[0]['nome'] = 'Alameda';
        
        $logradouros[1]['sigla'] = 'AV';
        $logradouros[1]['nome'] = 'Avenida';
        
        $logradouros[3]['sigla'] = 'BC';
        $logradouros[3]['nome'] = 'Beco';
        
        $logradouros[4]['sigla'] = 'BL';
        $logradouros[4]['nome'] = 'Bloco';
        
        $logradouros[5]['sigla'] = 'CAM';
        $logradouros[5]['nome'] = 'Caminho';
        
        $logradouros[6]['sigla'] = 'EST';
        $logradouros[6]['nome'] = 'Estação';
        
        $logradouros[7]['sigla'] = 'ETR';
        $logradouros[7]['nome'] = 'Estrada';
        
        $logradouros[8]['sigla'] = 'FAZ';
        $logradouros[8]['nome'] = 'Fazenda';
        
        $logradouros[9]['sigla'] = 'GL';
        $logradouros[9]['nome'] = 'Galeria';
        
        $logradouros[10]['sigla'] = 'LD';
        $logradouros[10]['nome'] = 'Laderia';
        
        $logradouros[11]['sigla'] = 'LGO';
        $logradouros[11]['nome'] = 'Largo';
        
        $logradouros[12]['sigla'] = 'PÇA';
        $logradouros[12]['nome'] = 'Praça';
        
        $logradouros[13]['sigla'] = 'PRQ';
        $logradouros[13]['nome'] = 'Parque';
        
        $logradouros[14]['sigla'] = 'PRQ';
        $logradouros[14]['nome'] = 'Parque';
        
        $logradouros[15]['sigla'] = 'PR';
        $logradouros[15]['nome'] = 'Praia';
        
        $logradouros[16]['sigla'] = 'QD';
        $logradouros[16]['nome'] = 'Quadra';
        
        $logradouros[17]['sigla'] = 'ROD';
        $logradouros[17]['nome'] = 'Rodovia';
        
        $logradouros[18]['sigla'] = 'R';
        $logradouros[18]['nome'] = 'Rua';
        
        $logradouros[19]['sigla'] = 'SQD';
        $logradouros[19]['nome'] = 'Super Quadra';
        
        $logradouros[20]['sigla'] = 'TRV';
        $logradouros[20]['nome'] = 'Travessa';
        
        $logradouros[21]['sigla'] = 'VD';
        $logradouros[21]['nome'] = 'Viaduto';
        
        foreach($logradouros as $logradouro) {
            $l = new TipoLogradouro();
            $l->sigla = $logradouro['sigla'];
            $l->nome = $logradouro['nome'];
            $l->save();
        }
        
       
    }
}
