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
        $cpfComMascara = substr($cpf, 0, 3);
        $cpfComMascara = $cpfComMascara . ".". substr($cpf, 3, 3);
        $cpfComMascara = $cpfComMascara . ".". substr($cpf, 6, 3);
        $cpfComMascara = $cpfComMascara . "-". substr($cpf, 9, 2);
        return $cpfComMascara;
    }
    
    public function trim(string $entrada) : string {
        return \trim($entrada);
    }
    
    public function hash(string $entrada) : string {
        return sha1($entrada);
    }

    public function trocarEspacoPorPorcento(string $entrada): string {
        return "%" . str_replace(" ", "%", $entrada)  . "%";
    }

    public function completarNumeroComZerosAEsquerda(string $entrada): string {
        return str_pad($entrada, 6, "0", STR_PAD_LEFT);
    }

    public function tudoMinusculo(string $entrada): string {
        return strtolower($entrada);
    }

}
