<?php

namespace App\Http\Controllers;

use App\Models\UsedService;

class UServiceController extends Controller
{
    public function __invoke()
    {
        return view('components.table', ['items' => UsedService::all(), 'get_route' => 'uservice.get', 'id_column' => 'uuid']);
    }
}
