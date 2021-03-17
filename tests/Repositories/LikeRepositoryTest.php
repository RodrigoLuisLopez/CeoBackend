<?php namespace Tests\Repositories;

use App\Models\Like;
use App\Repositories\LikeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class LikeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var LikeRepository
     */
    protected $likeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->likeRepo = \App::make(LikeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_like()
    {
        $like = Like::factory()->make()->toArray();

        $createdLike = $this->likeRepo->create($like);

        $createdLike = $createdLike->toArray();
        $this->assertArrayHasKey('id', $createdLike);
        $this->assertNotNull($createdLike['id'], 'Created Like must have id specified');
        $this->assertNotNull(Like::find($createdLike['id']), 'Like with given id must be in DB');
        $this->assertModelData($like, $createdLike);
    }

    /**
     * @test read
     */
    public function test_read_like()
    {
        $like = Like::factory()->create();

        $dbLike = $this->likeRepo->find($like->id);

        $dbLike = $dbLike->toArray();
        $this->assertModelData($like->toArray(), $dbLike);
    }

    /**
     * @test update
     */
    public function test_update_like()
    {
        $like = Like::factory()->create();
        $fakeLike = Like::factory()->make()->toArray();

        $updatedLike = $this->likeRepo->update($fakeLike, $like->id);

        $this->assertModelData($fakeLike, $updatedLike->toArray());
        $dbLike = $this->likeRepo->find($like->id);
        $this->assertModelData($fakeLike, $dbLike->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_like()
    {
        $like = Like::factory()->create();

        $resp = $this->likeRepo->delete($like->id);

        $this->assertTrue($resp);
        $this->assertNull(Like::find($like->id), 'Like should not exist in DB');
    }
}
