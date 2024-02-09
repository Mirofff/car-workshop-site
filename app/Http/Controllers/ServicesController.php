<?php

namespace App\Http\Controllers;

use App\Models\Service;

class ServicesController extends Controller
{
    public function __invoke()
    {
        return view('panel.entities.services', ['items' => Service::all()]);
    }
}
