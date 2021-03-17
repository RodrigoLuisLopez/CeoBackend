<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRecomendacionAPIRequest;
use App\Http\Requests\API\UpdateRecomendacionAPIRequest;
use App\Models\Recomendacion;
use App\Repositories\RecomendacionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class RecomendacionController
 * @package App\Http\Controllers\API
 */

class RecomendacionAPIController extends AppBaseController
{
    /** @var  RecomendacionRepository */
    private $recomendacionRepository;

    public function __construct(RecomendacionRepository $recomendacionRepo)
    {
        $this->recomendacionRepository = $recomendacionRepo;
    }

    /**
     * Display a listing of the Recomendacion.
     * GET|HEAD /recomendacions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $recomendacions = $this->recomendacionRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($recomendacions->toArray(), 'Recomendacions retrieved successfully');
    }

    /**
     * Store a newly created Recomendacion in storage.
     * POST /recomendacions
     *
     * @param CreateRecomendacionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateRecomendacionAPIRequest $request)
    {
        $input = $request->all();

        $recomendacion = $this->recomendacionRepository->create($input);

        return $this->sendResponse($recomendacion->toArray(), 'Recomendacion saved successfully');
    }

    /**
     * Display the specified Recomendacion.
     * GET|HEAD /recomendacions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Recomendacion $recomendacion */
        $recomendacion = $this->recomendacionRepository->find($id);

        if (empty($recomendacion)) {
            return $this->sendError('Recomendacion not found');
        }

        return $this->sendResponse($recomendacion->toArray(), 'Recomendacion retrieved successfully');
    }

    /**
     * Update the specified Recomendacion in storage.
     * PUT/PATCH /recomendacions/{id}
     *
     * @param int $id
     * @param UpdateRecomendacionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRecomendacionAPIRequest $request)
    {
        $input = $request->all();

        /** @var Recomendacion $recomendacion */
        $recomendacion = $this->recomendacionRepository->find($id);

        if (empty($recomendacion)) {
            return $this->sendError('Recomendacion not found');
        }

        $recomendacion = $this->recomendacionRepository->update($input, $id);

        return $this->sendResponse($recomendacion->toArray(), 'Recomendacion updated successfully');
    }

    /**
     * Remove the specified Recomendacion from storage.
     * DELETE /recomendacions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Recomendacion $recomendacion */
        $recomendacion = $this->recomendacionRepository->find($id);

        if (empty($recomendacion)) {
            return $this->sendError('Recomendacion not found');
        }

        $recomendacion->delete();

        return $this->sendSuccess('Recomendacion deleted successfully');
    }
}
