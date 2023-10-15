<?php

namespace App\Http\Controllers;

use Illuminate\Http\oRequest;
use Illuminate\Support\Facades\DB;

class EnginesTableController extends Controller
{
    public function __invoke()
    {
        $table = "engines";
        $rows = DB::table($table)->get();
        return view('tables.' . $table, array_merge(['rows' => $rows, 'title' => $table]));
    }
}
