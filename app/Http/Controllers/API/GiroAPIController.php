<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateGiroAPIRequest;
use App\Http\Requests\API\UpdateGiroAPIRequest;
use App\Models\Giro;
use App\Repositories\GiroRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class GiroController
 * @package App\Http\Controllers\API
 */

class GiroAPIController extends AppBaseController
{
    /** @var  GiroRepository */
    private $giroRepository;

    public function __construct(GiroRepository $giroRepo)
    {
        $this->giroRepository = $giroRepo;
    }

    /**
     * Display a listing of the Giro.
     * GET|HEAD /giros
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        
        $giros = Giro::orderby('id', 'desc')->paginate(6);

        return $giros;
    }

    /**
     * Store a newly created Giro in storage.
     * POST /giros
     *
     * @param CreateGiroAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateGiroAPIRequest $request)
    {
        $input = $request->all();

        $giro = $this->giroRepository->create($input);

        return $this->sendResponse($giro->toArray(), 'Giro saved successfully');
    }

    /**
     * Display the specified Giro.
     * GET|HEAD /giros/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Giro $giro */
        $giro = Giro::find($id);

        if (empty($giro)) {
            return $this->sendError('Giro not found');
        }

        return $giro;
    }

    /**
     * Update the specified Giro in storage.
     * PUT/PATCH /giros/{id}
     *
     * @param int $id
     * @param UpdateGiroAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGiroAPIRequest $request)
    {
        $input = $request->all();

        /** @var Giro $giro */
        $giro = $this->giroRepository->find($id);

        if (empty($giro)) {
            return $this->sendError('Giro not found');
        }

        $giro = $this->giroRepository->update($input, $id);

        return $this->sendResponse($giro->toArray(), 'Giro updated successfully');
    }

    /**
     * Remove the specified Giro from storage.
     * DELETE /giros/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Giro $giro */
        $giro = $this->giroRepository->find($id);

        if (empty($giro)) {
            return $this->sendError('Giro not found');
        }

        $giro->delete();

        return $this->sendSuccess('Giro deleted successfully');
    }
}
