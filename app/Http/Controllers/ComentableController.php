<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateComentableRequest;
use App\Http\Requests\UpdateComentableRequest;
use App\Repositories\ComentableRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Comentable;

class ComentableController extends AppBaseController
{
    /** @var  ComentableRepository */
    private $comentableRepository;

    public function __construct(ComentableRepository $comentableRepo)
    {
        $this->comentableRepository = $comentableRepo;
    }

    /**
     * Display a listing of the Comentable.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $comentables = Comentable::orderby('id', 'desc')->paginate(6);

        return view('comentables.index')
            ->with('comentables', $comentables);
    }

    /**
     * Show the form for creating a new Comentable.
     *
     * @return Response
     */
    public function create()
    {
        return view('comentables.create');
    }

    /**
     * Store a newly created Comentable in storage.
     *
     * @param CreateComentableRequest $request
     *
     * @return Response
     */
    public function store(CreateComentableRequest $request)
    {
        $input = $request->all();

        $comentable = $this->comentableRepository->create($input);

        $comentable->comentable_type = "App\Models\\".$request->comentable_type;
        $comentable->save();


        Flash::success('Comentable saved successfully.');

        return redirect(url($request->back));
    }

    /**
     * Display the specified Comentable.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $comentable = $this->comentableRepository->find($id);

        if (empty($comentable)) {
            Flash::error('Comentable not found');

            return redirect(route('comentables.index'));
        }

        return view('comentables.show')->with('comentable', $comentable);
    }

    /**
     * Show the form for editing the specified Comentable.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $comentable = $this->comentableRepository->find($id);

        if (empty($comentable)) {
            Flash::error('Comentable not found');

            return redirect(route('comentables.index'));
        }

        return view('comentables.edit')->with('comentable', $comentable);
    }

    /**
     * Update the specified Comentable in storage.
     *
     * @param int $id
     * @param UpdateComentableRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateComentableRequest $request)
    {
        $comentable = $this->comentableRepository->find($id);

        if (empty($comentable)) {
            Flash::error('Comentable not found');

            return redirect(route('comentables.index'));
        }

        $comentable = $this->comentableRepository->update($request->all(), $id);

        Flash::success('Comentable updated successfully.');

        return redirect(route('comentables.index'));
    }

    /**
     * Remove the specified Comentable from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $comentable = $this->comentableRepository->find($id);

        if (empty($comentable)) {
            Flash::error('Comentable not found');

            return redirect(route('comentables.index'));
        }

        $this->comentableRepository->delete($id);

        Flash::success('Comentable deleted successfully.');

        return redirect(route('comentables.index'));
    }
}
