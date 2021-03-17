<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Usuarios;

class UsuariosApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_usuarios()
    {
        $usuarios = Usuarios::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/usuarios', $usuarios
        );

        $this->assertApiResponse($usuarios);
    }

    /**
     * @test
     */
    public function test_read_usuarios()
    {
        $usuarios = Usuarios::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/usuarios/'.$usuarios->id
        );

        $this->assertApiResponse($usuarios->toArray());
    }

    /**
     * @test
     */
    public function test_update_usuarios()
    {
        $usuarios = Usuarios::factory()->create();
        $editedUsuarios = Usuarios::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/usuarios/'.$usuarios->id,
            $editedUsuarios
        );

        $this->assertApiResponse($editedUsuarios);
    }

    /**
     * @test
     */
    public function test_delete_usuarios()
    {
        $usuarios = Usuarios::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/usuarios/'.$usuarios->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/usuarios/'.$usuarios->id
        );

        $this->response->assertStatus(404);
    }
}
