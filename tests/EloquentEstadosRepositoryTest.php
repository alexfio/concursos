<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Concursos\Model\Repositories\Eloquent\EstadosRepository;


class EloquentEstadosRepositoryTest extends TestCase
{
    private $estadosRepository;
    public function setUp() {
        parent::setUp();
        $this->estadosRepository = new EstadosRepository();
    }
    
    public function testConsultarPorIdEstadoExistente()
    {
        
        $estado = $this->estadosRepository->getById(8);
        
        $this->assertArrayHasKey('id', $estado);
        $this->assertArrayHasKey('nome', $estado);
        $this->assertArrayHasKey('sigla', $estado);
    }
    
    /**
     * @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function testConsultarPorIdInexistente() {
        $this->estadosRepository->getById(1000000);
    }
    
    public function testConsultarPorSiglaExistente() {
        $estado = $this->estadosRepository->getBySigla('CE');
        $this->assertArrayHasKey('id', $estado);
        $this->assertArrayHasKey('nome', $estado);
        $this->assertArrayHasKey('sigla', $estado);
    }
    
     
    /**
     * @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function testConsultarPorSiglaInexistente() {
        $this->estadosRepository->getBySigla('ZE');
    }
    /**
     * @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function testObterCidadesPorIdEstadoInexistente() {
        $this->estadosRepository->getCidadesByEstadoId(1000000);
    }
    
    public function testObterCidadesPorIdEstadoExistente() {
        $estado = $this->estadosRepository->getCidadesByEstadoId(1);
        $this->assertArrayHasKey('id', $estado[0]);
        $this->assertArrayHasKey('nome', $estado[0]);
    }
   
    
}
