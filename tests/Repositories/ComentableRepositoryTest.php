<?php namespace Tests\Repositories;

use App\Models\Comentable;
use App\Repositories\ComentableRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ComentableRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ComentableRepository
     */
    protected $comentableRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->comentableRepo = \App::make(ComentableRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_comentable()
    {
        $comentable = Comentable::factory()->make()->toArray();

        $createdComentable = $this->comentableRepo->create($comentable);

        $createdComentable = $createdComentable->toArray();
        $this->assertArrayHasKey('id', $createdComentable);
        $this->assertNotNull($createdComentable['id'], 'Created Comentable must have id specified');
        $this->assertNotNull(Comentable::find($createdComentable['id']), 'Comentable with given id must be in DB');
        $this->assertModelData($comentable, $createdComentable);
    }

    /**
     * @test read
     */
    public function test_read_comentable()
    {
        $comentable = Comentable::factory()->create();

        $dbComentable = $this->comentableRepo->find($comentable->id);

        $dbComentable = $dbComentable->toArray();
        $this->assertModelData($comentable->toArray(), $dbComentable);
    }

    /**
     * @test update
     */
    public function test_update_comentable()
    {
        $comentable = Comentable::factory()->create();
        $fakeComentable = Comentable::factory()->make()->toArray();

        $updatedComentable = $this->comentableRepo->update($fakeComentable, $comentable->id);

        $this->assertModelData($fakeComentable, $updatedComentable->toArray());
        $dbComentable = $this->comentableRepo->find($comentable->id);
        $this->assertModelData($fakeComentable, $dbComentable->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_comentable()
    {
        $comentable = Comentable::factory()->create();

        $resp = $this->comentableRepo->delete($comentable->id);

        $this->assertTrue($resp);
        $this->assertNull(Comentable::find($comentable->id), 'Comentable should not exist in DB');
    }
}
