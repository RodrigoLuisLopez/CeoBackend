<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAlcanceRequest;
use App\Http\Requests\UpdateAlcanceRequest;
use App\Repositories\AlcanceRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Alcance;

class AlcanceController extends AppBaseController
{
    /** @var  AlcanceRepository */
    private $alcanceRepository;

    public function __construct(AlcanceRepository $alcanceRepo)
    {
        $this->alcanceRepository = $alcanceRepo;
    }

    /**
     * Display a listing of the Alcance.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $alcances = Alcance::orderby('id', 'desc')->paginate(6);

        return view('alcances.index')
            ->with('alcances', $alcances);
    }

    /**
     * Show the form for creating a new Alcance.
     *
     * @return Response
     */
    public function create()
    {
        return view('alcances.create');
    }

    /**
     * Store a newly created Alcance in storage.
     *
     * @param CreateAlcanceRequest $request
     *
     * @return Response
     */
    public function store(CreateAlcanceRequest $request)
    {
        $input = $request->all();

        $alcance = $this->alcanceRepository->create($input);

        Flash::success('Alcance saved successfully.');

        return redirect(route('alcances.index'));
    }

    /**
     * Display the specified Alcance.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $alcance = $this->alcanceRepository->find($id);

        if (empty($alcance)) {
            Flash::error('Alcance not found');

            return redirect(route('alcances.index'));
        }

        return view('alcances.show')->with('alcance', $alcance);
    }

    /**
     * Show the form for editing the specified Alcance.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $alcance = $this->alcanceRepository->find($id);

        if (empty($alcance)) {
            Flash::error('Alcance not found');

            return redirect(route('alcances.index'));
        }

        return view('alcances.edit')->with('alcance', $alcance);
    }

    /**
     * Update the specified Alcance in storage.
     *
     * @param int $id
     * @param UpdateAlcanceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAlcanceRequest $request)
    {
        $alcance = $this->alcanceRepository->find($id);

        if (empty($alcance)) {
            Flash::error('Alcance not found');

            return redirect(route('alcances.index'));
        }

        $alcance = $this->alcanceRepository->update($request->all(), $id);

        Flash::success('Alcance updated successfully.');

        return redirect(route('alcances.index'));
    }

    /**
     * Remove the specified Alcance from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $alcance = $this->alcanceRepository->find($id);

        if (empty($alcance)) {
            Flash::error('Alcance not found');

            return redirect(route('alcances.index'));
        }

        $this->alcanceRepository->delete($id);

        Flash::success('Alcance deleted successfully.');

        return redirect(route('alcances.index'));
    }
}
