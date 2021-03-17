<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Alcance;

class AlcanceApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_alcance()
    {
        $alcance = Alcance::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/alcances', $alcance
        );

        $this->assertApiResponse($alcance);
    }

    /**
     * @test
     */
    public function test_read_alcance()
    {
        $alcance = Alcance::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/alcances/'.$alcance->id
        );

        $this->assertApiResponse($alcance->toArray());
    }

    /**
     * @test
     */
    public function test_update_alcance()
    {
        $alcance = Alcance::factory()->create();
        $editedAlcance = Alcance::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/alcances/'.$alcance->id,
            $editedAlcance
        );

        $this->assertApiResponse($editedAlcance);
    }

    /**
     * @test
     */
    public function test_delete_alcance()
    {
        $alcance = Alcance::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/alcances/'.$alcance->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/alcances/'.$alcance->id
        );

        $this->response->assertStatus(404);
    }
}
