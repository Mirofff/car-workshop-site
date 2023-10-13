<?php

namespace App\Http\Controllers;

use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TableCarController extends Controller
{
    public function __invoke()
    {
        $rows = DB::table('cars')->get();
        return view('tables.cars', array_merge(['rows' => $rows, 'title' => 'Cars']));
    }

}
