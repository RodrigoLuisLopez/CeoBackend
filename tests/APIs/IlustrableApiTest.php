<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Ilustrable;

class IlustrableApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_ilustrable()
    {
        $ilustrable = Ilustrable::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/ilustrables', $ilustrable
        );

        $this->assertApiResponse($ilustrable);
    }

    /**
     * @test
     */
    public function test_read_ilustrable()
    {
        $ilustrable = Ilustrable::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/ilustrables/'.$ilustrable->id
        );

        $this->assertApiResponse($ilustrable->toArray());
    }

    /**
     * @test
     */
    public function test_update_ilustrable()
    {
        $ilustrable = Ilustrable::factory()->create();
        $editedIlustrable = Ilustrable::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/ilustrables/'.$ilustrable->id,
            $editedIlustrable
        );

        $this->assertApiResponse($editedIlustrable);
    }

    /**
     * @test
     */
    public function test_delete_ilustrable()
    {
        $ilustrable = Ilustrable::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/ilustrables/'.$ilustrable->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/ilustrables/'.$ilustrable->id
        );

        $this->response->assertStatus(404);
    }
}
