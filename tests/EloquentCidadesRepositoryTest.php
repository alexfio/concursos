<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Concursos\Model\Repositories\Eloquent\CidadesRepository;


class EloquentCidadesRepositoryTest extends TestCase
{
    use DatabaseMigrations;
    
    private $cidadesRepository;
    public function setUp() {
        
        parent::setUp();
        $this->artisan('db:seed', ['--class' => 'LogradourosSeeder']);
        $this->artisan('db:seed', ['--class' => 'EstadosSeeder']);
        $this->artisan('db:seed', ['--class' => 'CidadesSeederTest']);
        $this->cidadesRepository = new CidadesRepository();
        
    }
    
    public function testConsultarPorIdCidadeExistente()
    {
        
        $cidade = $this->cidadesRepository->findBy('id', 4850);
        $this->assertEquals(4850, $cidade['id']);
        $this->assertArrayHasKey('id', $cidade);
        $this->assertArrayHasKey('nome', $cidade);
        
    }
    
    /**
     * @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function testConsultarPorIdCidadeInexistente() {
        $this->cidadesRepository->findBy('id', 1000000);
    }
    
}
