<?php namespace Tests\Repositories;

use App\Models\Seguidor;
use App\Repositories\SeguidorRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class SeguidorRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var SeguidorRepository
     */
    protected $seguidorRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->seguidorRepo = \App::make(SeguidorRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_seguidor()
    {
        $seguidor = Seguidor::factory()->make()->toArray();

        $createdSeguidor = $this->seguidorRepo->create($seguidor);

        $createdSeguidor = $createdSeguidor->toArray();
        $this->assertArrayHasKey('id', $createdSeguidor);
        $this->assertNotNull($createdSeguidor['id'], 'Created Seguidor must have id specified');
        $this->assertNotNull(Seguidor::find($createdSeguidor['id']), 'Seguidor with given id must be in DB');
        $this->assertModelData($seguidor, $createdSeguidor);
    }

    /**
     * @test read
     */
    public function test_read_seguidor()
    {
        $seguidor = Seguidor::factory()->create();

        $dbSeguidor = $this->seguidorRepo->find($seguidor->id);

        $dbSeguidor = $dbSeguidor->toArray();
        $this->assertModelData($seguidor->toArray(), $dbSeguidor);
    }

    /**
     * @test update
     */
    public function test_update_seguidor()
    {
        $seguidor = Seguidor::factory()->create();
        $fakeSeguidor = Seguidor::factory()->make()->toArray();

        $updatedSeguidor = $this->seguidorRepo->update($fakeSeguidor, $seguidor->id);

        $this->assertModelData($fakeSeguidor, $updatedSeguidor->toArray());
        $dbSeguidor = $this->seguidorRepo->find($seguidor->id);
        $this->assertModelData($fakeSeguidor, $dbSeguidor->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_seguidor()
    {
        $seguidor = Seguidor::factory()->create();

        $resp = $this->seguidorRepo->delete($seguidor->id);

        $this->assertTrue($resp);
        $this->assertNull(Seguidor::find($seguidor->id), 'Seguidor should not exist in DB');
    }
}
