<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Concursos\Model\Repositories\Eloquent\CandidatosRepository;
use Concursos\Helpers\TransformadorDadosDefault;

class EloquentCandidatosRepositoryTest extends TestCase
{
    private $candidatosRepository;
    private $novoCandidato;
    private $transformador;
    
   
    
    public function setUp() {
        parent::setUp();
        $this->transformador = new TransformadorDadosDefault();
        $this->candidatosRepository = new CandidatosRepository($this->transformador);
    }
    
    /**
     * @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function testConsultarPorIdInexistente() {
        $this->candidatosRepository->getById(1000000);
    }
    
    public function testConsultarPorIdExistente() {
        $candidato = $this->candidatosRepository->getById(1);
        $this->assertEquals(1, $candidato['id']);
        $this->assertArrayHasKey('nome', $candidato);
        $this->assertArrayHasKey('nascimento', $candidato);
        $this->assertArrayHasKey('cpf', $candidato);
    }
    
    /**
     * @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function testConsultarPorEmailInexistente() {
        $this->candidatosRepository->getByEmail('blablabla');
    }
    
    public function testConsultarPorEmailExistente() {
        $candidato = $this->candidatosRepository->getByEmail('alexfiofcasf@gmail.com');
        $this->assertEquals('alexfiofcasf@gmail.com', $candidato['email']);
        
    }
    
    /**
     * @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function testConsultarPorCPFInexistente() {
        $this->candidatosRepository->getByCPF('blablabla');
    }
    
    public function testConsultarPorCPFExistente() {
        $candidato = $this->candidatosRepository->getByCPF('02464310328');
        $this->assertEquals('02464310328', $candidato['cpf']);
        
    }
    

    public function testCriarNovoCandidato() {
        $this->novoCandidato['nome'] = 'Adriana Mena Rebouças';
        $this->novoCandidato['nascimento'] = '08/03/1975';
        $this->novoCandidato['email'] = 'glamreboucas@gmail.com';
        $this->novoCandidato['telefone_residencial'] = '(011)32232416';
        $this->novoCandidato['telefone_celular'] = '(011)996511476';
        $this->novoCandidato['cpf'] = '674.834.060-89';
        $this->novoCandidato['rg'] = '3003004000246';
        $this->novoCandidato['rg_org_exp'] = 'SSP';
        $this->novoCandidato['rg_uf'] = 25;
        $this->novoCandidato['rg_data_expedicao'] = '17/08/1987';
        $this->novoCandidato['cidade'] = 4850;
        $this->novoCandidato['tipo_logradouro'] = 1;
        $this->novoCandidato['logradouro'] = 'Campinas';
        $this->novoCandidato['numero'] = '1533';
        $this->novoCandidato['cep'] = '60020295';
        $this->novoCandidato['bairro'] = 'Higienópolis';
        $idCandidato = 
          $this->candidatosRepository->criarOuAtualizar($this->novoCandidato); 
        
        $this->assertInternalType('int', $idCandidato);
        
        $candidato = $this->candidatosRepository->getById($idCandidato);
        
        $this->assertEquals('67483406089', $candidato['cpf']);
        
    }
}
