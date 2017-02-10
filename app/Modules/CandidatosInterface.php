<?php
namespace Concursos\Modules;

interface CandidatosInterface {
    public function cadastrarOuAtualizar(array $dados);
    public function recuperarSenha(string $email);
    public function enviarEmail(array $dados) : bool; 
    public function consultar(array $criterios, int $pagina, int $qtdPorPagina): array;
}
