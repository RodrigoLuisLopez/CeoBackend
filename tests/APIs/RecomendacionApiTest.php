<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Recomendacion;

class RecomendacionApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_recomendacion()
    {
        $recomendacion = Recomendacion::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/recomendacions', $recomendacion
        );

        $this->assertApiResponse($recomendacion);
    }

    /**
     * @test
     */
    public function test_read_recomendacion()
    {
        $recomendacion = Recomendacion::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/recomendacions/'.$recomendacion->id
        );

        $this->assertApiResponse($recomendacion->toArray());
    }

    /**
     * @test
     */
    public function test_update_recomendacion()
    {
        $recomendacion = Recomendacion::factory()->create();
        $editedRecomendacion = Recomendacion::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/recomendacions/'.$recomendacion->id,
            $editedRecomendacion
        );

        $this->assertApiResponse($editedRecomendacion);
    }

    /**
     * @test
     */
    public function test_delete_recomendacion()
    {
        $recomendacion = Recomendacion::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/recomendacions/'.$recomendacion->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/recomendacions/'.$recomendacion->id
        );

        $this->response->assertStatus(404);
    }
}
