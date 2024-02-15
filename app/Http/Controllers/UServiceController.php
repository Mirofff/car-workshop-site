<?php

namespace App\Http\Controllers;

use App\Models\UsedService;
use Illuminate\Support\Facades\Schema;

class UServiceController extends Controller
{
    public function __invoke()
    {
        return view('components.table',
            ['items' => UsedService::all(),
             'columns' => Schema::getColumnListing('used_services'),
             'get_route' => 'uservice.get',
             'id_column' => 'uuid']);
    }
}
