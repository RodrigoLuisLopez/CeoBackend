<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\User;
use App\Models\Estado;
use App\Models\Privacidad;
use App\Models\Ilustrable;


class UserController extends AppBaseController
{

    public function index(Request $request)
    {
        $users = User::orderby('id', 'desc')->paginate(6);

        return view('users.index')
            ->with('users', $users);
    }

    
    
    public function create()
    {
        return view('users.create');
    }


    public function store(CreateIlustrableRequest $request)
    {
    }





    public function show($id)
    {
        $user = User::find($id);

        if (empty($user)) {
            Flash::error('user not found');

            return redirect(route('users.index'));
        }
        $imagenes = Ilustrable::where('ilustrable_id', $id)->where('ilustrable_type', 'App\Models\User')->paginate(6);

        return view('users.show', compact('user', 'imagenes'));
    }



    public function edit($id)
    {
        $user = User::find($id);

        if (empty($user)) {
            Flash::error('user not found');

            return redirect(route('users.index'));
        }

        $privacidads = Privacidad::pluck('nombre','id');
        $estados = Estado::pluck('nombre', 'id');
        return view('users.edit', compact('user', 'estados','privacidads'));
    }


    public function update($id, Request $request)
    {
        $user = User::find($id);

        if (empty($user)) {
            Flash::error('user not found');

            return redirect(route('users.index'));
        }

        
        $user->name = $request['name'];
        $user->edad = $request['edad'];
        $user->direccion = $request['direccion'];
        $user->telefono = $request['telefono'];
        $user->biografia = $request['biografia'];
        $user->facebook = $request['facebook'];
        $user->twiter = $request['twiter'];
        $user->instagram = $request['instagram'];
        $user->estado_id = $request['estado_id'];
        $user->privacidad_id = $request['privacidad_id'];
        $user->save();

        Flash::success('user updated successfully.');

        return redirect(route('users.index'));
    }




    public function destroy($id, Request $request)
    {/* 
        $ilustrable = $this->ilustrableRepository->find($id);

        if (empty($ilustrable)) {
            Flash::error('Ilustrable not found');

            return redirect(route('ilustrables.index'));
        }

        Storage::disk('s3')->delete($ilustrable->urls, 'public');

        $this->ilustrableRepository->delete($id);

        Flash::success('Ilustrable deleted successfully.');

        return redirect(url($request->back)); */
    }


}
