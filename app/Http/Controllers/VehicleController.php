<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Support\Facades\Schema;

class VehicleController extends Controller
{
    public function __invoke()
    {
        return view('components.table',
            ['items' => Vehicle::all(), 'columns' => Schema::getColumnListing('vehicles'), 'get_route' => 'vehicle.get', 'id_column' => 'uuid']);
    }
}
