<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateIlustrableRequest;
use App\Http\Requests\UpdateIlustrableRequest;
use App\Repositories\IlustrableRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use Illuminate\Support\Facades\Storage;
use App\Models\Ilustrable;

class IlustrableController extends AppBaseController
{
    /** @var  IlustrableRepository */
    private $ilustrableRepository;

    public function __construct(IlustrableRepository $ilustrableRepo)
    {
        $this->ilustrableRepository = $ilustrableRepo;
    }

    /**
     * Display a listing of the Ilustrable.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        
        $ilustrables = Ilustrable::orderby('id', 'desc')->paginate(6);

        return view('ilustrables.index')
            ->with('ilustrables', $ilustrables);
    }

    /**
     * Show the form for creating a new Ilustrable.
     *
     * @return Response
     */
    public function create()
    {
        return view('ilustrables.create');
    }

    /**
     * Store a newly created Ilustrable in storage.
     *
     * @param CreateIlustrableRequest $request
     *
     * @return Response
     */
    public function store(CreateIlustrableRequest $request)
    {
        $input = $request->all();

        $ilustrable = $this->ilustrableRepository->create($input);



        if ($request->file('url')) {
            $archivo = $request->file('url');

            $pathOriginal = Storage::disk('s3')->put('imagenes', $archivo, 'public');
            
            $ilustrable->fill(['url'=>env('AWS_URL').$pathOriginal])->save();
            
            $ilustrable->fill(['urls'=> $pathOriginal])->save();
            
        }



        $ilustrable->ilustrable_type = "App\Models\\".$request->ilustrable_type;
        $ilustrable->save();

        Flash::success('Ilustrable saved successfully.');

        return redirect(url($request->back));
    }

    /**
     * Display the specified Ilustrable.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ilustrable = $this->ilustrableRepository->find($id);

        if (empty($ilustrable)) {
            Flash::error('Ilustrable not found');

            return redirect(route('ilustrables.index'));
        }

        return view('ilustrables.show')->with('ilustrable', $ilustrable);
    }

    /**
     * Show the form for editing the specified Ilustrable.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ilustrable = $this->ilustrableRepository->find($id);

        if (empty($ilustrable)) {
            Flash::error('Ilustrable not found');

            return redirect(route('ilustrables.index'));
        }

        return view('ilustrables.edit')->with('ilustrable', $ilustrable);
    }

    /**
     * Update the specified Ilustrable in storage.
     *
     * @param int $id
     * @param UpdateIlustrableRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIlustrableRequest $request)
    {
        $ilustrable = $this->ilustrableRepository->find($id);

        if (empty($ilustrable)) {
            Flash::error('Ilustrable not found');

            return redirect(route('ilustrables.index'));
        }

        $ilustrable = $this->ilustrableRepository->update($request->all(), $id);

        Flash::success('Ilustrable updated successfully.');

        return redirect(route('ilustrables.index'));
    }

    /**
     * Remove the specified Ilustrable from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id, Request $request)
    {
        $ilustrable = $this->ilustrableRepository->find($id);

        if (empty($ilustrable)) {
            Flash::error('Ilustrable not found');

            return redirect(route('ilustrables.index'));
        }

        Storage::disk('s3')->delete($ilustrable->urls, 'public');

        $this->ilustrableRepository->delete($id);

        Flash::success('Ilustrable deleted successfully.');

        return redirect(url($request->back));
    }
}
