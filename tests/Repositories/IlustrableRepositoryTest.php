<?php namespace Tests\Repositories;

use App\Models\Ilustrable;
use App\Repositories\IlustrableRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class IlustrableRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var IlustrableRepository
     */
    protected $ilustrableRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->ilustrableRepo = \App::make(IlustrableRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_ilustrable()
    {
        $ilustrable = Ilustrable::factory()->make()->toArray();

        $createdIlustrable = $this->ilustrableRepo->create($ilustrable);

        $createdIlustrable = $createdIlustrable->toArray();
        $this->assertArrayHasKey('id', $createdIlustrable);
        $this->assertNotNull($createdIlustrable['id'], 'Created Ilustrable must have id specified');
        $this->assertNotNull(Ilustrable::find($createdIlustrable['id']), 'Ilustrable with given id must be in DB');
        $this->assertModelData($ilustrable, $createdIlustrable);
    }

    /**
     * @test read
     */
    public function test_read_ilustrable()
    {
        $ilustrable = Ilustrable::factory()->create();

        $dbIlustrable = $this->ilustrableRepo->find($ilustrable->id);

        $dbIlustrable = $dbIlustrable->toArray();
        $this->assertModelData($ilustrable->toArray(), $dbIlustrable);
    }

    /**
     * @test update
     */
    public function test_update_ilustrable()
    {
        $ilustrable = Ilustrable::factory()->create();
        $fakeIlustrable = Ilustrable::factory()->make()->toArray();

        $updatedIlustrable = $this->ilustrableRepo->update($fakeIlustrable, $ilustrable->id);

        $this->assertModelData($fakeIlustrable, $updatedIlustrable->toArray());
        $dbIlustrable = $this->ilustrableRepo->find($ilustrable->id);
        $this->assertModelData($fakeIlustrable, $dbIlustrable->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_ilustrable()
    {
        $ilustrable = Ilustrable::factory()->create();

        $resp = $this->ilustrableRepo->delete($ilustrable->id);

        $this->assertTrue($resp);
        $this->assertNull(Ilustrable::find($ilustrable->id), 'Ilustrable should not exist in DB');
    }
}
