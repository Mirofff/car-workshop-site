<?php

namespace App\Http\Controllers;

use App\Models\Service;

class ServicesController extends Controller
{
    public function __invoke()
    {
        return view('components.table', ['items' => Service::all(), 'get_route' => 'service.get', 'id_column' => 'id']);
    }
}
