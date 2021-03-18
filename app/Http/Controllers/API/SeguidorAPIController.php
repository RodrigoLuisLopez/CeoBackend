<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSeguidorAPIRequest;
use App\Http\Requests\API\UpdateSeguidorAPIRequest;
use App\Models\Seguidor;
use App\Repositories\SeguidorRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SeguidorController
 * @package App\Http\Controllers\API
 */

class SeguidorAPIController extends AppBaseController
{
    /** @var  SeguidorRepository */
    private $seguidorRepository;

    public function __construct(SeguidorRepository $seguidorRepo)
    {
        $this->seguidorRepository = $seguidorRepo;
    }

    /**
     * Display a listing of the Seguidor.
     * GET|HEAD /seguidors
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        
        $seguidors = Seguidor::orderby('id', 'desc')->paginate(6);

        return $seguidors;
    }

    /**
     * Store a newly created Seguidor in storage.
     * POST /seguidors
     *
     * @param CreateSeguidorAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSeguidorAPIRequest $request)
    {
        $input = $request->all();

        $seguidor = $this->seguidorRepository->create($input);

        return $this->sendResponse($seguidor->toArray(), 'Seguidor saved successfully');
    }

    /**
     * Display the specified Seguidor.
     * GET|HEAD /seguidors/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Seguidor $seguidor */
        $seguidor = Seguidor::find($id);

        if (empty($seguidor)) {
            return $this->sendError('Seguidor not found');
        }

        return $seguidor;
    }

    /**
     * Update the specified Seguidor in storage.
     * PUT/PATCH /seguidors/{id}
     *
     * @param int $id
     * @param UpdateSeguidorAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSeguidorAPIRequest $request)
    {
        $input = $request->all();

        /** @var Seguidor $seguidor */
        $seguidor = $this->seguidorRepository->find($id);

        if (empty($seguidor)) {
            return $this->sendError('Seguidor not found');
        }

        $seguidor = $this->seguidorRepository->update($input, $id);

        return $this->sendResponse($seguidor->toArray(), 'Seguidor updated successfully');
    }

    /**
     * Remove the specified Seguidor from storage.
     * DELETE /seguidors/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Seguidor $seguidor */
        $seguidor = $this->seguidorRepository->find($id);

        if (empty($seguidor)) {
            return $this->sendError('Seguidor not found');
        }

        $seguidor->delete();

        return $this->sendSuccess('Seguidor deleted successfully');
    }
}
