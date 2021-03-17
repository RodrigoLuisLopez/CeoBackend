<?php namespace Tests\Repositories;

use App\Models\Alcance;
use App\Repositories\AlcanceRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class AlcanceRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var AlcanceRepository
     */
    protected $alcanceRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->alcanceRepo = \App::make(AlcanceRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_alcance()
    {
        $alcance = Alcance::factory()->make()->toArray();

        $createdAlcance = $this->alcanceRepo->create($alcance);

        $createdAlcance = $createdAlcance->toArray();
        $this->assertArrayHasKey('id', $createdAlcance);
        $this->assertNotNull($createdAlcance['id'], 'Created Alcance must have id specified');
        $this->assertNotNull(Alcance::find($createdAlcance['id']), 'Alcance with given id must be in DB');
        $this->assertModelData($alcance, $createdAlcance);
    }

    /**
     * @test read
     */
    public function test_read_alcance()
    {
        $alcance = Alcance::factory()->create();

        $dbAlcance = $this->alcanceRepo->find($alcance->id);

        $dbAlcance = $dbAlcance->toArray();
        $this->assertModelData($alcance->toArray(), $dbAlcance);
    }

    /**
     * @test update
     */
    public function test_update_alcance()
    {
        $alcance = Alcance::factory()->create();
        $fakeAlcance = Alcance::factory()->make()->toArray();

        $updatedAlcance = $this->alcanceRepo->update($fakeAlcance, $alcance->id);

        $this->assertModelData($fakeAlcance, $updatedAlcance->toArray());
        $dbAlcance = $this->alcanceRepo->find($alcance->id);
        $this->assertModelData($fakeAlcance, $dbAlcance->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_alcance()
    {
        $alcance = Alcance::factory()->create();

        $resp = $this->alcanceRepo->delete($alcance->id);

        $this->assertTrue($resp);
        $this->assertNull(Alcance::find($alcance->id), 'Alcance should not exist in DB');
    }
}
