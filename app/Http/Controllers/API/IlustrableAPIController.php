<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateIlustrableAPIRequest;
use App\Http\Requests\API\UpdateIlustrableAPIRequest;
use App\Models\Ilustrable;
use App\Repositories\IlustrableRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class IlustrableController
 * @package App\Http\Controllers\API
 */

class IlustrableAPIController extends AppBaseController
{
    /** @var  IlustrableRepository */
    private $ilustrableRepository;

    public function __construct(IlustrableRepository $ilustrableRepo)
    {
        $this->ilustrableRepository = $ilustrableRepo;
    }

    /**
     * Display a listing of the Ilustrable.
     * GET|HEAD /ilustrables
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $ilustrables = $this->ilustrableRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($ilustrables->toArray(), 'Ilustrables retrieved successfully');
    }

    /**
     * Store a newly created Ilustrable in storage.
     * POST /ilustrables
     *
     * @param CreateIlustrableAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateIlustrableAPIRequest $request)
    {
        $input = $request->all();

        $ilustrable = $this->ilustrableRepository->create($input);

        return $this->sendResponse($ilustrable->toArray(), 'Ilustrable saved successfully');
    }

    /**
     * Display the specified Ilustrable.
     * GET|HEAD /ilustrables/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Ilustrable $ilustrable */
        $ilustrable = $this->ilustrableRepository->find($id);

        if (empty($ilustrable)) {
            return $this->sendError('Ilustrable not found');
        }

        return $this->sendResponse($ilustrable->toArray(), 'Ilustrable retrieved successfully');
    }

    /**
     * Update the specified Ilustrable in storage.
     * PUT/PATCH /ilustrables/{id}
     *
     * @param int $id
     * @param UpdateIlustrableAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIlustrableAPIRequest $request)
    {
        $input = $request->all();

        /** @var Ilustrable $ilustrable */
        $ilustrable = $this->ilustrableRepository->find($id);

        if (empty($ilustrable)) {
            return $this->sendError('Ilustrable not found');
        }

        $ilustrable = $this->ilustrableRepository->update($input, $id);

        return $this->sendResponse($ilustrable->toArray(), 'Ilustrable updated successfully');
    }

    /**
     * Remove the specified Ilustrable from storage.
     * DELETE /ilustrables/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Ilustrable $ilustrable */
        $ilustrable = $this->ilustrableRepository->find($id);

        if (empty($ilustrable)) {
            return $this->sendError('Ilustrable not found');
        }

        $ilustrable->delete();

        return $this->sendSuccess('Ilustrable deleted successfully');
    }
}
