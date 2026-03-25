<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class GeneralController extends Controller
{
    public function generalTable()
    {
        return Inertia::render("Dashboard/Contact/General");
    }

    public function crearContacto()
    {
        return Inertia::render("Dashboard/Contact/CreateContact");
    }
}
