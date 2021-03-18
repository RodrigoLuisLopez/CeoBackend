<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRecomendacionRequest;
use App\Http\Requests\UpdateRecomendacionRequest;
use App\Repositories\RecomendacionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\User;
use App\Models\Giro;
use App\Models\Alcance;
use App\Models\Recomendacion;

class RecomendacionController extends AppBaseController
{
    /** @var  RecomendacionRepository */
    private $recomendacionRepository;

    public function __construct(RecomendacionRepository $recomendacionRepo)
    {
        $this->recomendacionRepository = $recomendacionRepo;
    }

    /**
     * Display a listing of the Recomendacion.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $recomendacions = Recomendacion::orderby('id', 'desc')->paginate(6);

        return view('recomendacions.index')
            ->with('recomendacions', $recomendacions);
    }

    /**
     * Show the form for creating a new Recomendacion.
     *
     * @return Response
     */
    public function create()
    {
        $usuarios = User::pluck('name','id');
        $giros = Giro::pluck('nombre','id');
        $alcances = Alcance::pluck('nombre','id');
        return view('recomendacions.create', compact('usuarios','giros','alcances'));
    }

    /**
     * Store a newly created Recomendacion in storage.
     *
     * @param CreateRecomendacionRequest $request
     *
     * @return Response
     */
    public function store(CreateRecomendacionRequest $request)
    {
        $input = $request->all();

        $recomendacion = $this->recomendacionRepository->create($input);

        Flash::success('Recomendacion saved successfully.');

        return redirect(route('recomendacions.index'));
    }

    /**
     * Display the specified Recomendacion.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $recomendacion = $this->recomendacionRepository->find($id);

        if (empty($recomendacion)) {
            Flash::error('Recomendacion not found');

            return redirect(route('recomendacions.index'));
        }

        return view('recomendacions.show')->with('recomendacion', $recomendacion);
    }

    /**
     * Show the form for editing the specified Recomendacion.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $recomendacion = $this->recomendacionRepository->find($id);

        if (empty($recomendacion)) {
            Flash::error('Recomendacion not found');

            return redirect(route('recomendacions.index'));
        }

        $usuarios = User::pluck('name','id');
        $giros = Giro::pluck('nombre','id');
        $alcances = Alcance::pluck('nombre','id');
        return view('recomendacions.edit', compact('recomendacion','usuarios','giros','alcances'));
    }

    /**
     * Update the specified Recomendacion in storage.
     *
     * @param int $id
     * @param UpdateRecomendacionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRecomendacionRequest $request)
    {
        $recomendacion = $this->recomendacionRepository->find($id);

        if (empty($recomendacion)) {
            Flash::error('Recomendacion not found');

            return redirect(route('recomendacions.index'));
        }

        $recomendacion = $this->recomendacionRepository->update($request->all(), $id);

        Flash::success('Recomendacion updated successfully.');

        return redirect(route('recomendacions.index'));
    }

    /**
     * Remove the specified Recomendacion from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $recomendacion = $this->recomendacionRepository->find($id);

        if (empty($recomendacion)) {
            Flash::error('Recomendacion not found');

            return redirect(route('recomendacions.index'));
        }

        $this->recomendacionRepository->delete($id);

        Flash::success('Recomendacion deleted successfully.');

        return redirect(route('recomendacions.index'));
    }
}
