<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Concursos\Model\Repositories\Eloquent\CidadesRepository;


class EloquentCidadesRepositoryTest extends TestCase
{
    private $cidadesRepository;
    public function setUp() {
        parent::setUp();
        $this->cidadesRepository = new CidadesRepository();
    }
    
    public function testConsultarPorIdCidadeExistente()
    {
        
        $cidade = $this->cidadesRepository->getById(8);
        
        $this->assertArrayHasKey('id', $cidade);
        $this->assertArrayHasKey('nome', $cidade);
        
    }
    
    /**
     * @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function testConsultarPorIdCidadeInexistente() {
        $this->cidadesRepository->getById(1000000);
    }
    
}
