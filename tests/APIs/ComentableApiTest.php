<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Comentable;

class ComentableApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_comentable()
    {
        $comentable = Comentable::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/comentables', $comentable
        );

        $this->assertApiResponse($comentable);
    }

    /**
     * @test
     */
    public function test_read_comentable()
    {
        $comentable = Comentable::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/comentables/'.$comentable->id
        );

        $this->assertApiResponse($comentable->toArray());
    }

    /**
     * @test
     */
    public function test_update_comentable()
    {
        $comentable = Comentable::factory()->create();
        $editedComentable = Comentable::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/comentables/'.$comentable->id,
            $editedComentable
        );

        $this->assertApiResponse($editedComentable);
    }

    /**
     * @test
     */
    public function test_delete_comentable()
    {
        $comentable = Comentable::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/comentables/'.$comentable->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/comentables/'.$comentable->id
        );

        $this->response->assertStatus(404);
    }
}
