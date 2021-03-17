<?php namespace Tests\Repositories;

use App\Models\Privacidad;
use App\Repositories\PrivacidadRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PrivacidadRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PrivacidadRepository
     */
    protected $privacidadRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->privacidadRepo = \App::make(PrivacidadRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_privacidad()
    {
        $privacidad = Privacidad::factory()->make()->toArray();

        $createdPrivacidad = $this->privacidadRepo->create($privacidad);

        $createdPrivacidad = $createdPrivacidad->toArray();
        $this->assertArrayHasKey('id', $createdPrivacidad);
        $this->assertNotNull($createdPrivacidad['id'], 'Created Privacidad must have id specified');
        $this->assertNotNull(Privacidad::find($createdPrivacidad['id']), 'Privacidad with given id must be in DB');
        $this->assertModelData($privacidad, $createdPrivacidad);
    }

    /**
     * @test read
     */
    public function test_read_privacidad()
    {
        $privacidad = Privacidad::factory()->create();

        $dbPrivacidad = $this->privacidadRepo->find($privacidad->id);

        $dbPrivacidad = $dbPrivacidad->toArray();
        $this->assertModelData($privacidad->toArray(), $dbPrivacidad);
    }

    /**
     * @test update
     */
    public function test_update_privacidad()
    {
        $privacidad = Privacidad::factory()->create();
        $fakePrivacidad = Privacidad::factory()->make()->toArray();

        $updatedPrivacidad = $this->privacidadRepo->update($fakePrivacidad, $privacidad->id);

        $this->assertModelData($fakePrivacidad, $updatedPrivacidad->toArray());
        $dbPrivacidad = $this->privacidadRepo->find($privacidad->id);
        $this->assertModelData($fakePrivacidad, $dbPrivacidad->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_privacidad()
    {
        $privacidad = Privacidad::factory()->create();

        $resp = $this->privacidadRepo->delete($privacidad->id);

        $this->assertTrue($resp);
        $this->assertNull(Privacidad::find($privacidad->id), 'Privacidad should not exist in DB');
    }
}
