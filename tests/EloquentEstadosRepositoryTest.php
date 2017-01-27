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
        $this->assertEquals('CE', $estado['sigla']);
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
        $cidades = $this->estadosRepository->getCidadesByEstadoId(1);
        $this->assertEquals(1, $cidades[0]['estado_id']);
        $this->assertArrayHasKey('id', $cidades[0]);
        $this->assertArrayHasKey('nome', $cidades[0]);
    }   
   
    
}
