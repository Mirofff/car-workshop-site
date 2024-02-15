<?php

namespace App\Http\Controllers;

use App\Models\Request as StatementRequest;
use Illuminate\Support\Facades\Schema;

class RequestController extends Controller
{
    public function __invoke()
    {
        return view('admin.index',
            ['items' => StatementRequest::all(),
             'columns' => Schema::getColumnListing('requests'),
             'get_route' => 'reqeust.get',
             'id_column' => 'uuid',
            ]);
    }
}
