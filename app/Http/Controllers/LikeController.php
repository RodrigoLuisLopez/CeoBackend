<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLikeRequest;
use App\Http\Requests\UpdateLikeRequest;
use App\Repositories\LikeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Usuarios;
use App\Models\Post;
use App\Models\Like;

class LikeController extends AppBaseController
{
    /** @var  LikeRepository */
    private $likeRepository;

    public function __construct(LikeRepository $likeRepo)
    {
        $this->likeRepository = $likeRepo;
    }

    /**
     * Display a listing of the Like.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $likes = Like::orderby('id', 'desc')->paginate(6);

        return view('likes.index')
            ->with('likes', $likes);
    }

    /**
     * Show the form for creating a new Like.
     *
     * @return Response
     */
    public function create()
    {
        $usuarios = Usuarios::pluck('nombre','id');
        $posts = Post::pluck('titulo','id');
        return view('likes.create', compact('usuarios', 'posts'));
    }

    /**
     * Store a newly created Like in storage.
     *
     * @param CreateLikeRequest $request
     *
     * @return Response
     */
    public function store(CreateLikeRequest $request)
    {
        $input = $request->all();

        $like = $this->likeRepository->create($input);

        Flash::success('Like saved successfully.');

        return redirect(route('likes.index'));
    }

    /**
     * Display the specified Like.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $like = $this->likeRepository->find($id);

        if (empty($like)) {
            Flash::error('Like not found');

            return redirect(route('likes.index'));
        }

        return view('likes.show')->with('like', $like);
    }

    /**
     * Show the form for editing the specified Like.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $like = $this->likeRepository->find($id);

        if (empty($like)) {
            Flash::error('Like not found');

            return redirect(route('likes.index'));
        }

        $usuarios = Usuarios::pluck('nombre','id');
        $posts = Post::pluck('titulo','id');

        return view('likes.edit', compact('like', 'usuarios', 'posts'));
    }

    /**
     * Update the specified Like in storage.
     *
     * @param int $id
     * @param UpdateLikeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLikeRequest $request)
    {
        $like = $this->likeRepository->find($id);

        if (empty($like)) {
            Flash::error('Like not found');

            return redirect(route('likes.index'));
        }

        $like = $this->likeRepository->update($request->all(), $id);

        Flash::success('Like updated successfully.');

        return redirect(route('likes.index'));
    }

    /**
     * Remove the specified Like from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $like = $this->likeRepository->find($id);

        if (empty($like)) {
            Flash::error('Like not found');

            return redirect(route('likes.index'));
        }

        $this->likeRepository->delete($id);

        Flash::success('Like deleted successfully.');

        return redirect(route('likes.index'));
    }
}
