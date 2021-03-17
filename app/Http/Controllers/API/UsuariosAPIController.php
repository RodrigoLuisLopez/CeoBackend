<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUsuariosAPIRequest;
use App\Http\Requests\API\UpdateUsuariosAPIRequest;
use App\Models\Usuarios;
use App\Repositories\UsuariosRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class UsuariosController
 * @package App\Http\Controllers\API
 */

class UsuariosAPIController extends AppBaseController
{
    /** @var  UsuariosRepository */
    private $usuariosRepository;

    public function __construct(UsuariosRepository $usuariosRepo)
    {
        $this->usuariosRepository = $usuariosRepo;
    }

    /**
     * Display a listing of the Usuarios.
     * GET|HEAD /usuarios
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $usuarios = $this->usuariosRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($usuarios->toArray(), 'Usuarios retrieved successfully');
    }

    /**
     * Store a newly created Usuarios in storage.
     * POST /usuarios
     *
     * @param CreateUsuariosAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateUsuariosAPIRequest $request)
    {
        $input = $request->all();

        $usuarios = $this->usuariosRepository->create($input);

        return $this->sendResponse($usuarios->toArray(), 'Usuarios saved successfully');
    }

    /**
     * Display the specified Usuarios.
     * GET|HEAD /usuarios/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Usuarios $usuarios */
        $usuarios = $this->usuariosRepository->find($id);

        if (empty($usuarios)) {
            return $this->sendError('Usuarios not found');
        }

        return $this->sendResponse($usuarios->toArray(), 'Usuarios retrieved successfully');
    }

    /**
     * Update the specified Usuarios in storage.
     * PUT/PATCH /usuarios/{id}
     *
     * @param int $id
     * @param UpdateUsuariosAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUsuariosAPIRequest $request)
    {
        $input = $request->all();

        /** @var Usuarios $usuarios */
        $usuarios = $this->usuariosRepository->find($id);

        if (empty($usuarios)) {
            return $this->sendError('Usuarios not found');
        }

        $usuarios = $this->usuariosRepository->update($input, $id);

        return $this->sendResponse($usuarios->toArray(), 'Usuarios updated successfully');
    }

    /**
     * Remove the specified Usuarios from storage.
     * DELETE /usuarios/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Usuarios $usuarios */
        $usuarios = $this->usuariosRepository->find($id);

        if (empty($usuarios)) {
            return $this->sendError('Usuarios not found');
        }

        $usuarios->delete();

        return $this->sendSuccess('Usuarios deleted successfully');
    }
}
