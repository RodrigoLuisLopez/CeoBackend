<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Seguidor;

class SeguidorApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_seguidor()
    {
        $seguidor = Seguidor::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/seguidors', $seguidor
        );

        $this->assertApiResponse($seguidor);
    }

    /**
     * @test
     */
    public function test_read_seguidor()
    {
        $seguidor = Seguidor::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/seguidors/'.$seguidor->id
        );

        $this->assertApiResponse($seguidor->toArray());
    }

    /**
     * @test
     */
    public function test_update_seguidor()
    {
        $seguidor = Seguidor::factory()->create();
        $editedSeguidor = Seguidor::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/seguidors/'.$seguidor->id,
            $editedSeguidor
        );

        $this->assertApiResponse($editedSeguidor);
    }

    /**
     * @test
     */
    public function test_delete_seguidor()
    {
        $seguidor = Seguidor::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/seguidors/'.$seguidor->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/seguidors/'.$seguidor->id
        );

        $this->response->assertStatus(404);
    }
}
