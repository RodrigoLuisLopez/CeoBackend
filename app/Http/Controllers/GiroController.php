<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGiroRequest;
use App\Http\Requests\UpdateGiroRequest;
use App\Repositories\GiroRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Giro;

class GiroController extends AppBaseController
{
    /** @var  GiroRepository */
    private $giroRepository;

    public function __construct(GiroRepository $giroRepo)
    {
        $this->giroRepository = $giroRepo;
    }

    /**
     * Display a listing of the Giro.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $giros = Giro::orderby('id', 'desc')->paginate(6);

        return view('giros.index')
            ->with('giros', $giros);
    }

    /**
     * Show the form for creating a new Giro.
     *
     * @return Response
     */
    public function create()
    {
        return view('giros.create');
    }

    /**
     * Store a newly created Giro in storage.
     *
     * @param CreateGiroRequest $request
     *
     * @return Response
     */
    public function store(CreateGiroRequest $request)
    {
        $input = $request->all();

        $giro = $this->giroRepository->create($input);

        Flash::success('Giro saved successfully.');

        return redirect(route('giros.index'));
    }

    /**
     * Display the specified Giro.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $giro = $this->giroRepository->find($id);

        if (empty($giro)) {
            Flash::error('Giro not found');

            return redirect(route('giros.index'));
        }

        return view('giros.show')->with('giro', $giro);
    }

    /**
     * Show the form for editing the specified Giro.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $giro = $this->giroRepository->find($id);

        if (empty($giro)) {
            Flash::error('Giro not found');

            return redirect(route('giros.index'));
        }

        return view('giros.edit')->with('giro', $giro);
    }

    /**
     * Update the specified Giro in storage.
     *
     * @param int $id
     * @param UpdateGiroRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGiroRequest $request)
    {
        $giro = $this->giroRepository->find($id);

        if (empty($giro)) {
            Flash::error('Giro not found');

            return redirect(route('giros.index'));
        }

        $giro = $this->giroRepository->update($request->all(), $id);

        Flash::success('Giro updated successfully.');

        return redirect(route('giros.index'));
    }

    /**
     * Remove the specified Giro from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $giro = $this->giroRepository->find($id);

        if (empty($giro)) {
            Flash::error('Giro not found');

            return redirect(route('giros.index'));
        }

        $this->giroRepository->delete($id);

        Flash::success('Giro deleted successfully.');

        return redirect(route('giros.index'));
    }
}
