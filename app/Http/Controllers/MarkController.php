<?php

namespace App\Http\Controllers;

use App\Models\Mark;

class MarkController extends Controller
{
    public function __invoke()
    {
        return view('components.table', ['items' => Mark::all(), 'get_route' => 'mark.get', 'id_column' => 'id']);
    }
}
