<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Like;

class LikeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_like()
    {
        $like = Like::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/likes', $like
        );

        $this->assertApiResponse($like);
    }

    /**
     * @test
     */
    public function test_read_like()
    {
        $like = Like::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/likes/'.$like->id
        );

        $this->assertApiResponse($like->toArray());
    }

    /**
     * @test
     */
    public function test_update_like()
    {
        $like = Like::factory()->create();
        $editedLike = Like::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/likes/'.$like->id,
            $editedLike
        );

        $this->assertApiResponse($editedLike);
    }

    /**
     * @test
     */
    public function test_delete_like()
    {
        $like = Like::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/likes/'.$like->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/likes/'.$like->id
        );

        $this->response->assertStatus(404);
    }
}
