<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AgendaController extends Controller
{
    public function index()
    {
        return view("site.index");
    }

    public function criar()
    {
        $id = null;
        return view('site.formulario-agenda', compact("id"));
    }

    public function editar($id)
    {
        return view('site.formulario-agenda', compact("id"));
    }

    public function agenda($id)
    {
        return view('site.agenda', compact("id"));
    }
}
