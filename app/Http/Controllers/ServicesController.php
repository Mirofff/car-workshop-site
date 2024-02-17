<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Support\Facades\Schema;

class ServicesController extends Controller
{
    public function __invoke()
    {
        return view('components.table',
            ['items' => Service::all(),
             'columns' => Schema::getColumnListing('services'),
             'get_route' => 'service.get',
             'id_column' => 'id']);
    }
}
