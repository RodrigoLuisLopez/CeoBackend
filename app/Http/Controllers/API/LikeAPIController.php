<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLikeAPIRequest;
use App\Http\Requests\API\UpdateLikeAPIRequest;
use App\Models\Like;
use App\Repositories\LikeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class LikeController
 * @package App\Http\Controllers\API
 */

class LikeAPIController extends AppBaseController
{
    /** @var  LikeRepository */
    private $likeRepository;

    public function __construct(LikeRepository $likeRepo)
    {
        $this->likeRepository = $likeRepo;
    }

    /**
     * Display a listing of the Like.
     * GET|HEAD /likes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $likes = $this->likeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($likes->toArray(), 'Likes retrieved successfully');
    }

    /**
     * Store a newly created Like in storage.
     * POST /likes
     *
     * @param CreateLikeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateLikeAPIRequest $request)
    {
        $input = $request->all();

        $like = $this->likeRepository->create($input);

        return $this->sendResponse($like->toArray(), 'Like saved successfully');
    }

    /**
     * Display the specified Like.
     * GET|HEAD /likes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Like $like */
        $like = $this->likeRepository->find($id);

        if (empty($like)) {
            return $this->sendError('Like not found');
        }

        return $this->sendResponse($like->toArray(), 'Like retrieved successfully');
    }

    /**
     * Update the specified Like in storage.
     * PUT/PATCH /likes/{id}
     *
     * @param int $id
     * @param UpdateLikeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLikeAPIRequest $request)
    {
        $input = $request->all();

        /** @var Like $like */
        $like = $this->likeRepository->find($id);

        if (empty($like)) {
            return $this->sendError('Like not found');
        }

        $like = $this->likeRepository->update($input, $id);

        return $this->sendResponse($like->toArray(), 'Like updated successfully');
    }

    /**
     * Remove the specified Like from storage.
     * DELETE /likes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Like $like */
        $like = $this->likeRepository->find($id);

        if (empty($like)) {
            return $this->sendError('Like not found');
        }

        $like->delete();

        return $this->sendSuccess('Like deleted successfully');
    }
}
