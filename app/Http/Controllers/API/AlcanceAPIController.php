<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAlcanceAPIRequest;
use App\Http\Requests\API\UpdateAlcanceAPIRequest;
use App\Models\Alcance;
use App\Repositories\AlcanceRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class AlcanceController
 * @package App\Http\Controllers\API
 */

class AlcanceAPIController extends AppBaseController
{
    /** @var  AlcanceRepository */
    private $alcanceRepository;

    public function __construct(AlcanceRepository $alcanceRepo)
    {
        $this->alcanceRepository = $alcanceRepo;
    }

    /**
     * Display a listing of the Alcance.
     * GET|HEAD /alcances
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $alcances = Alcance::orderby('id', 'desc')->paginate(10);

        return $alcances;
    }

    /**
     * Store a newly created Alcance in storage.
     * POST /alcances
     *
     * @param CreateAlcanceAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAlcanceAPIRequest $request)
    {
        $input = $request->all();

        $alcance = $this->alcanceRepository->create($input);

        return $this->sendResponse($alcance->toArray(), 'Alcance saved successfully');
    }

    /**
     * Display the specified Alcance.
     * GET|HEAD /alcances/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Alcance $alcance */
        $alcance =Alcance::find($id);

        if (empty($alcance)) {
            return $this->sendError('Alcance not found');
        }

        return $alcance;
    }

    /**
     * Update the specified Alcance in storage.
     * PUT/PATCH /alcances/{id}
     *
     * @param int $id
     * @param UpdateAlcanceAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAlcanceAPIRequest $request)
    {
        $input = $request->all();

        /** @var Alcance $alcance */
        $alcance = $this->alcanceRepository->find($id);

        if (empty($alcance)) {
            return $this->sendError('Alcance not found');
        }

        $alcance = $this->alcanceRepository->update($input, $id);

        return $this->sendResponse($alcance->toArray(), 'Alcance updated successfully');
    }

    /**
     * Remove the specified Alcance from storage.
     * DELETE /alcances/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Alcance $alcance */
        $alcance = $this->alcanceRepository->find($id);

        if (empty($alcance)) {
            return $this->sendError('Alcance not found');
        }

        $alcance->delete();

        return $this->sendSuccess('Alcance deleted successfully');
    }
}
