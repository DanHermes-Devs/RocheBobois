<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Showroom;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        $showrooms = Showroom::paginate(4);
        return view('index', compact('sliders', 'showrooms'));
    }

    public function sucursales()
    {
        return view('showroom');
    }

    public function contacto()
    {
        return view('contacto');
    }

    public function bienvenida()
    {
        return view('bienvenida');
    }
}
