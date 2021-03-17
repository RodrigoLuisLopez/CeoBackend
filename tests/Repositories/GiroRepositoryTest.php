<?php namespace Tests\Repositories;

use App\Models\Giro;
use App\Repositories\GiroRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class GiroRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var GiroRepository
     */
    protected $giroRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->giroRepo = \App::make(GiroRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_giro()
    {
        $giro = Giro::factory()->make()->toArray();

        $createdGiro = $this->giroRepo->create($giro);

        $createdGiro = $createdGiro->toArray();
        $this->assertArrayHasKey('id', $createdGiro);
        $this->assertNotNull($createdGiro['id'], 'Created Giro must have id specified');
        $this->assertNotNull(Giro::find($createdGiro['id']), 'Giro with given id must be in DB');
        $this->assertModelData($giro, $createdGiro);
    }

    /**
     * @test read
     */
    public function test_read_giro()
    {
        $giro = Giro::factory()->create();

        $dbGiro = $this->giroRepo->find($giro->id);

        $dbGiro = $dbGiro->toArray();
        $this->assertModelData($giro->toArray(), $dbGiro);
    }

    /**
     * @test update
     */
    public function test_update_giro()
    {
        $giro = Giro::factory()->create();
        $fakeGiro = Giro::factory()->make()->toArray();

        $updatedGiro = $this->giroRepo->update($fakeGiro, $giro->id);

        $this->assertModelData($fakeGiro, $updatedGiro->toArray());
        $dbGiro = $this->giroRepo->find($giro->id);
        $this->assertModelData($fakeGiro, $dbGiro->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_giro()
    {
        $giro = Giro::factory()->create();

        $resp = $this->giroRepo->delete($giro->id);

        $this->assertTrue($resp);
        $this->assertNull(Giro::find($giro->id), 'Giro should not exist in DB');
    }
}
