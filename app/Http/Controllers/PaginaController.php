<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash;
use Response;


class PaginaController extends Controller
{
    public function index()
    {
        return view('Cliente.root');
    }

}
