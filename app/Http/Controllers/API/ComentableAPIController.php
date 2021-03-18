<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateComentableAPIRequest;
use App\Http\Requests\API\UpdateComentableAPIRequest;
use App\Models\Comentable;
use App\Repositories\ComentableRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ComentableController
 * @package App\Http\Controllers\API
 */

class ComentableAPIController extends AppBaseController
{
    /** @var  ComentableRepository */
    private $comentableRepository;

    public function __construct(ComentableRepository $comentableRepo)
    {
        $this->comentableRepository = $comentableRepo;
    }

    /**
     * Display a listing of the Comentable.
     * GET|HEAD /comentables
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
       
        $comentables = Comentable::orderby('id', 'desc')->paginate(6);

        return $comentables;
    }

    /**
     * Store a newly created Comentable in storage.
     * POST /comentables
     *
     * @param CreateComentableAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateComentableAPIRequest $request)
    {
        $input = $request->all();

        $comentable = $this->comentableRepository->create($input);

        return $this->sendResponse($comentable->toArray(), 'Comentable saved successfully');
    }

    /**
     * Display the specified Comentable.
     * GET|HEAD /comentables/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Comentable $comentable */
        $comentable = Comentable::find($id);

        if (empty($comentable)) {
            return $this->sendError('Comentable not found');
        }

        return $comentable;
    }

    /**
     * Update the specified Comentable in storage.
     * PUT/PATCH /comentables/{id}
     *
     * @param int $id
     * @param UpdateComentableAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateComentableAPIRequest $request)
    {
        $input = $request->all();

        /** @var Comentable $comentable */
        $comentable = $this->comentableRepository->find($id);

        if (empty($comentable)) {
            return $this->sendError('Comentable not found');
        }

        $comentable = $this->comentableRepository->update($input, $id);

        return $this->sendResponse($comentable->toArray(), 'Comentable updated successfully');
    }

    /**
     * Remove the specified Comentable from storage.
     * DELETE /comentables/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Comentable $comentable */
        $comentable = $this->comentableRepository->find($id);

        if (empty($comentable)) {
            return $this->sendError('Comentable not found');
        }

        $comentable->delete();

        return $this->sendSuccess('Comentable deleted successfully');
    }
}
