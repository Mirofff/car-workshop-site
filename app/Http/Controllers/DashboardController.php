<?php

namespace App\Http\Controllers;

use App\Models\Request;
use Illuminate\Support\Facades\Schema;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('admin.dashboard',
            ["columns" => Schema::getColumnListing('requests'),
             "requests" => Request::all()]);
    }
}
