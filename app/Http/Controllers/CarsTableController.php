<?php

namespace App\Http\Controllers;

use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarsTableController extends Controller
{
    public function __invoke()
    {
        $table = "cars";
        $rows = DB::table($table)->get();
        return view('tables.' . $table, array_merge(['rows' => $rows, 'title' => $table]));
    }

}
