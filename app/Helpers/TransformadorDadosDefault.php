<?php

namespace Concursos\Helpers;
use Concursos\Helpers\TransformadorDadosInterface;

class TransformadorDadosDefault implements TransformadorDadosInterface {
    
    //As funções são aplicadas na ordem em que foram passadas na cadeia....
    public function aplicarComposicao(string $cadeia, $dado) {
        $transformacoes = explode('|', $cadeia);
        foreach($transformacoes as $transformacao) {
           $dado = $this->$transformacao($dado); 
        }
        
        return $dado;
    }
    
    public function converterDataBrasileiraParaDateTime(string $data) : \DateTime {
        return \DateTime::createFromFormat('d/m/Y', $data);
    }

    public function converterDateTimeParaDataBrasileira(\DateTime $data) : string {
       return $data->format('d/m/Y'); 
    }

    public function deixarApenasNumeros(string $entrada) : string {
        return preg_replace('/[^0-9]/', '', $entrada);
    }
    
    public function adicionarMascaraTelefone(string $telefone): string {
        
    }

    public function adicionarMascaraCPF(string $cpf) : string {
        
    }
    
    public function trim(string $entrada) : string {
        return \trim($entrada);
    }
}