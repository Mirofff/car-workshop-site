<?php

namespace App\Http\Controllers;

use App\Models\Workshop;

class WorkshopsController extends Controller
{
    public function __invoke()
    {
        return view(
            'components.table',
            ['items' => Workshop::all(), 'get_route' => 'workshop.get', 'id_column' => 'id']
        );
    }
}
