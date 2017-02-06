<?php

namespace Concursos\Helpers;

interface TransformadorDadosInterface {
    public function aplicarComposicao(string $cadeia, $dado);
    public function converterDataBrasileiraParaDateTime(string $data) : \DateTime;
    public function converterDateTimeParaDataBrasileira(\DateTime $data) : string;
    public function deixarApenasNumeros(string $entrada) : string;
    public function adicionarMascaraTelefone(string $telefone) : string;
    public function adicionarMascaraCPF(string $cpf) : string;
    public function trim(string $entrada) : string;
    public function hash(string $entrada) : string;
    public function trocarEspacoPorPorcento(string $entrada) : string;
}
