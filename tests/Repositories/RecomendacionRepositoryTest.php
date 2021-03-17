<?php namespace Tests\Repositories;

use App\Models\Recomendacion;
use App\Repositories\RecomendacionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class RecomendacionRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var RecomendacionRepository
     */
    protected $recomendacionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->recomendacionRepo = \App::make(RecomendacionRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_recomendacion()
    {
        $recomendacion = Recomendacion::factory()->make()->toArray();

        $createdRecomendacion = $this->recomendacionRepo->create($recomendacion);

        $createdRecomendacion = $createdRecomendacion->toArray();
        $this->assertArrayHasKey('id', $createdRecomendacion);
        $this->assertNotNull($createdRecomendacion['id'], 'Created Recomendacion must have id specified');
        $this->assertNotNull(Recomendacion::find($createdRecomendacion['id']), 'Recomendacion with given id must be in DB');
        $this->assertModelData($recomendacion, $createdRecomendacion);
    }

    /**
     * @test read
     */
    public function test_read_recomendacion()
    {
        $recomendacion = Recomendacion::factory()->create();

        $dbRecomendacion = $this->recomendacionRepo->find($recomendacion->id);

        $dbRecomendacion = $dbRecomendacion->toArray();
        $this->assertModelData($recomendacion->toArray(), $dbRecomendacion);
    }

    /**
     * @test update
     */
    public function test_update_recomendacion()
    {
        $recomendacion = Recomendacion::factory()->create();
        $fakeRecomendacion = Recomendacion::factory()->make()->toArray();

        $updatedRecomendacion = $this->recomendacionRepo->update($fakeRecomendacion, $recomendacion->id);

        $this->assertModelData($fakeRecomendacion, $updatedRecomendacion->toArray());
        $dbRecomendacion = $this->recomendacionRepo->find($recomendacion->id);
        $this->assertModelData($fakeRecomendacion, $dbRecomendacion->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_recomendacion()
    {
        $recomendacion = Recomendacion::factory()->create();

        $resp = $this->recomendacionRepo->delete($recomendacion->id);

        $this->assertTrue($resp);
        $this->assertNull(Recomendacion::find($recomendacion->id), 'Recomendacion should not exist in DB');
    }
}
