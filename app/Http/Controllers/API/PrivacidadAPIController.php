<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePrivacidadAPIRequest;
use App\Http\Requests\API\UpdatePrivacidadAPIRequest;
use App\Models\Privacidad;
use App\Repositories\PrivacidadRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PrivacidadController
 * @package App\Http\Controllers\API
 */

class PrivacidadAPIController extends AppBaseController
{
    /** @var  PrivacidadRepository */
    private $privacidadRepository;

    public function __construct(PrivacidadRepository $privacidadRepo)
    {
        $this->privacidadRepository = $privacidadRepo;
    }

    /**
     * Display a listing of the Privacidad.
     * GET|HEAD /privacidads
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {        
        $privacidads = Privacidad::orderby('id', 'desc')->paginate(6);

        return $privacidads;
    }

    /**
     * Store a newly created Privacidad in storage.
     * POST /privacidads
     *
     * @param CreatePrivacidadAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePrivacidadAPIRequest $request)
    {
        $input = $request->all();

        $privacidad = $this->privacidadRepository->create($input);

        return $this->sendResponse($privacidad->toArray(), 'Privacidad saved successfully');
    }

    /**
     * Display the specified Privacidad.
     * GET|HEAD /privacidads/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Privacidad $privacidad */
        $privacidad = Privacidad::find($id);

        if (empty($privacidad)) {
            return $this->sendError('Privacidad not found');
        }

        return $privacidad;
    }

    /**
     * Update the specified Privacidad in storage.
     * PUT/PATCH /privacidads/{id}
     *
     * @param int $id
     * @param UpdatePrivacidadAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePrivacidadAPIRequest $request)
    {
        $input = $request->all();

        /** @var Privacidad $privacidad */
        $privacidad = $this->privacidadRepository->find($id);

        if (empty($privacidad)) {
            return $this->sendError('Privacidad not found');
        }

        $privacidad = $this->privacidadRepository->update($input, $id);

        return $this->sendResponse($privacidad->toArray(), 'Privacidad updated successfully');
    }

    /**
     * Remove the specified Privacidad from storage.
     * DELETE /privacidads/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Privacidad $privacidad */
        $privacidad = $this->privacidadRepository->find($id);

        if (empty($privacidad)) {
            return $this->sendError('Privacidad not found');
        }

        $privacidad->delete();

        return $this->sendSuccess('Privacidad deleted successfully');
    }
}
