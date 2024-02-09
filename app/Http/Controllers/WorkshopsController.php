<?php

namespace App\Http\Controllers;

use App\Models\Workshop;

class WorkshopsController extends Controller
{
    public function __invoke()
    {
        return view('panel.entities.workshops', ['items' => Workshop::all()]);
    }
}
