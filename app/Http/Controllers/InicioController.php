<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class InicioController extends Controller
{

    public function sidebar()
    {
        return Inertia::render('menu/Sidebar');
    }
}
