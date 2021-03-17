<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Giro;

class GiroApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_giro()
    {
        $giro = Giro::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/giros', $giro
        );

        $this->assertApiResponse($giro);
    }

    /**
     * @test
     */
    public function test_read_giro()
    {
        $giro = Giro::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/giros/'.$giro->id
        );

        $this->assertApiResponse($giro->toArray());
    }

    /**
     * @test
     */
    public function test_update_giro()
    {
        $giro = Giro::factory()->create();
        $editedGiro = Giro::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/giros/'.$giro->id,
            $editedGiro
        );

        $this->assertApiResponse($editedGiro);
    }

    /**
     * @test
     */
    public function test_delete_giro()
    {
        $giro = Giro::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/giros/'.$giro->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/giros/'.$giro->id
        );

        $this->response->assertStatus(404);
    }
}
