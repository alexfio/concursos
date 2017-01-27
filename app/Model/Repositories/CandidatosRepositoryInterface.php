<?php

namespace Concursos\Model\Repositories;

interface CandidatosRepositoryInterface {
    public function getById(int $id) : array;
    public function getByCPF(string $cpf) : array;
    public function getByEmail(string $email) : array;
    public function criarOuAtualizar(array $dados) :  int;
}

