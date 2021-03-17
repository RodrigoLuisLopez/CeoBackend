<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSeguidorRequest;
use App\Http\Requests\UpdateSeguidorRequest;
use App\Repositories\SeguidorRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Usuarios;
use App\Models\Seguidor;

class SeguidorController extends AppBaseController
{
    /** @var  SeguidorRepository */
    private $seguidorRepository;

    public function __construct(SeguidorRepository $seguidorRepo)
    {
        $this->seguidorRepository = $seguidorRepo;
    }

    /**
     * Display a listing of the Seguidor.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $seguidors = Seguidor::orderby('id', 'desc')->paginate(6);

        return view('seguidors.index')
            ->with('seguidors', $seguidors);
    }

    /**
     * Show the form for creating a new Seguidor.
     *
     * @return Response
     */
    public function create()
    {
        
        $usuarios = Usuarios::pluck('nombre','id');
        return view('seguidors.create', compact('usuarios'));
    }

    /**
     * Store a newly created Seguidor in storage.
     *
     * @param CreateSeguidorRequest $request
     *
     * @return Response
     */
    public function store(CreateSeguidorRequest $request)
    {
        $input = $request->all();

        $seguidor = $this->seguidorRepository->create($input);

        Flash::success('Seguidor saved successfully.');

        return redirect(route('seguidors.index'));
    }

    /**
     * Display the specified Seguidor.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $seguidor = $this->seguidorRepository->find($id);

        if (empty($seguidor)) {
            Flash::error('Seguidor not found');

            return redirect(route('seguidors.index'));
        }

        return view('seguidors.show')->with('seguidor', $seguidor);
    }

    /**
     * Show the form for editing the specified Seguidor.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $seguidor = $this->seguidorRepository->find($id);

        if (empty($seguidor)) {
            Flash::error('Seguidor not found');

            return redirect(route('seguidors.index'));
        }

        $usuarios = Usuarios::pluck('nombre','id');
        return view('seguidors.edit', compact('seguidor','usuarios'));
    }

    /**
     * Update the specified Seguidor in storage.
     *
     * @param int $id
     * @param UpdateSeguidorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSeguidorRequest $request)
    {
        $seguidor = $this->seguidorRepository->find($id);

        if (empty($seguidor)) {
            Flash::error('Seguidor not found');

            return redirect(route('seguidors.index'));
        }

        $seguidor = $this->seguidorRepository->update($request->all(), $id);

        Flash::success('Seguidor updated successfully.');

        return redirect(route('seguidors.index'));
    }

    /**
     * Remove the specified Seguidor from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $seguidor = $this->seguidorRepository->find($id);

        if (empty($seguidor)) {
            Flash::error('Seguidor not found');

            return redirect(route('seguidors.index'));
        }

        $this->seguidorRepository->delete($id);

        Flash::success('Seguidor deleted successfully.');

        return redirect(route('seguidors.index'));
    }
}
