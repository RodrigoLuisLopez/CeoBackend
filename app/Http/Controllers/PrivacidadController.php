<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePrivacidadRequest;
use App\Http\Requests\UpdatePrivacidadRequest;
use App\Repositories\PrivacidadRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Privacidad;

class PrivacidadController extends AppBaseController
{
    /** @var  PrivacidadRepository */
    private $privacidadRepository;

    public function __construct(PrivacidadRepository $privacidadRepo)
    {
        $this->privacidadRepository = $privacidadRepo;
    }

    /**
     * Display a listing of the Privacidad.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $privacidads = Privacidad::orderby('id', 'desc')->paginate(6);

        return view('privacidads.index')
            ->with('privacidads', $privacidads);
    }

    /**
     * Show the form for creating a new Privacidad.
     *
     * @return Response
     */
    public function create()
    {
        return view('privacidads.create');
    }

    /**
     * Store a newly created Privacidad in storage.
     *
     * @param CreatePrivacidadRequest $request
     *
     * @return Response
     */
    public function store(CreatePrivacidadRequest $request)
    {
        $input = $request->all();

        $privacidad = $this->privacidadRepository->create($input);

        Flash::success('Privacidad saved successfully.');

        return redirect(route('privacidads.index'));
    }

    /**
     * Display the specified Privacidad.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $privacidad = $this->privacidadRepository->find($id);

        if (empty($privacidad)) {
            Flash::error('Privacidad not found');

            return redirect(route('privacidads.index'));
        }

        return view('privacidads.show')->with('privacidad', $privacidad);
    }

    /**
     * Show the form for editing the specified Privacidad.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $privacidad = $this->privacidadRepository->find($id);

        if (empty($privacidad)) {
            Flash::error('Privacidad not found');

            return redirect(route('privacidads.index'));
        }

        return view('privacidads.edit')->with('privacidad', $privacidad);
    }

    /**
     * Update the specified Privacidad in storage.
     *
     * @param int $id
     * @param UpdatePrivacidadRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePrivacidadRequest $request)
    {
        $privacidad = $this->privacidadRepository->find($id);

        if (empty($privacidad)) {
            Flash::error('Privacidad not found');

            return redirect(route('privacidads.index'));
        }

        $privacidad = $this->privacidadRepository->update($request->all(), $id);

        Flash::success('Privacidad updated successfully.');

        return redirect(route('privacidads.index'));
    }

    /**
     * Remove the specified Privacidad from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $privacidad = $this->privacidadRepository->find($id);

        if (empty($privacidad)) {
            Flash::error('Privacidad not found');

            return redirect(route('privacidads.index'));
        }

        $this->privacidadRepository->delete($id);

        Flash::success('Privacidad deleted successfully.');

        return redirect(route('privacidads.index'));
    }
}
