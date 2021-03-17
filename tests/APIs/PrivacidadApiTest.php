<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Privacidad;

class PrivacidadApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_privacidad()
    {
        $privacidad = Privacidad::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/privacidads', $privacidad
        );

        $this->assertApiResponse($privacidad);
    }

    /**
     * @test
     */
    public function test_read_privacidad()
    {
        $privacidad = Privacidad::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/privacidads/'.$privacidad->id
        );

        $this->assertApiResponse($privacidad->toArray());
    }

    /**
     * @test
     */
    public function test_update_privacidad()
    {
        $privacidad = Privacidad::factory()->create();
        $editedPrivacidad = Privacidad::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/privacidads/'.$privacidad->id,
            $editedPrivacidad
        );

        $this->assertApiResponse($editedPrivacidad);
    }

    /**
     * @test
     */
    public function test_delete_privacidad()
    {
        $privacidad = Privacidad::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/privacidads/'.$privacidad->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/privacidads/'.$privacidad->id
        );

        $this->response->assertStatus(404);
    }
}
