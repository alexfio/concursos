<?php

use Illuminate\Database\Seeder;
use Concursos\Model\Estado;

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estados = [];
        $estados[0]['nome'] = 'Acre';
        $estados[0]['sigla'] = 'AC';
        
        $estados[1]['nome'] = 'Alagoas';
        $estados[1]['sigla'] = 'AL';
        
        
        $estados[2]['nome'] = 'Amapá';
        $estados[2]['sigla'] = 'AP';
        
        $estados[3]['nome'] = 'Amazonas';
        $estados[3]['sigla'] = 'AM';
        
        $estados[4]['nome'] = 'Bahia';
        $estados[4]['sigla'] = 'BA';
        
        $estados[5]['nome'] = 'Ceará';
        $estados[5]['sigla'] = 'CE';
        
        $estados[6]['nome'] = 'Distrito Federal';
        $estados[6]['sigla'] = 'DF';
        
        $estados[7]['nome'] = 'Espírito Santo';
        $estados[7]['sigla'] = 'ES';
        
        $estados[8]['nome'] = 'Goiás';
        $estados[8]['sigla'] = 'GO';
        
        $estados[9]['nome'] = 'Maranhão';
        $estados[9]['sigla'] = 'MA';
        
        $estados[10]['nome'] = 'Mato Grosso';
        $estados[10]['sigla'] = 'MT';
        
        $estados[11]['nome'] = 'Mato Grosso do Sul';
        $estados[11]['sigla'] = 'MS';
        
        
        $estados[12]['nome'] = 'Minas Gerais';
        $estados[12]['sigla'] = 'MG';
        
        $estados[13]['nome'] = 'Pará';
        $estados[13]['sigla'] = 'PA';
        
        $estados[14]['nome'] = 'Paraíba';
        $estados[14]['sigla'] = 'MB';
        
        $estados[15]['nome'] = 'Paraná';
        $estados[15]['sigla'] = 'PR';
        
        $estados[16]['nome'] = 'Pernambuco';
        $estados[16]['sigla'] = 'PE';
        
        $estados[17]['nome'] = 'Piauí';
        $estados[17]['sigla'] = 'PI';
        
      
        $estados[18]['nome'] = 'Rio de Janeiro';
        $estados[18]['sigla'] = 'RJ';
        
        $estados[19]['nome'] = 'Rio Grande do Norte';
        $estados[19]['sigla'] = 'RN';
        
        $estados[20]['nome'] = 'Rio Grande do Sul';
        $estados[20]['sigla'] = 'RS';
        
        $estados[21]['nome'] = 'Rondônia';
        $estados[21]['sigla'] = 'RO';
        
        $estados[22]['nome'] = 'Roraima';
        $estados[22]['sigla'] = 'RR';
        
        $estados[23]['nome'] = 'Santa Catarina';
        $estados[23]['sigla'] = 'SC';
        
        $estados[24]['nome'] = 'São Paulo';
        $estados[24]['sigla'] = 'SP';
        
        $estados[25]['nome'] = 'Sergipe';
        $estados[25]['sigla'] = 'SE';
        
        $estados[26]['nome'] = 'Tocatins';
        $estados[26]['sigla'] = 'TO';
        
        foreach($estados as $estado) {
            $e = new Estado();
            $e->sigla = $estado['sigla'];
            $e->nome = $estado['nome'];
            $e->save();
        }
        
       
    }
}
