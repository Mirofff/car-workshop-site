<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;

class VehicleController extends Controller
{
    public function __invoke()
    {
        return view('components.table', ['items' => Vehicle::all(), 'get_route' => 'vehicle.get', 'id_column' => 'uuid']);
    }
}
