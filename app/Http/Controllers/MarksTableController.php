<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MarksTableController extends Controller
{
    public function __invoke()
    {
        $table = "marks";
        $rows = DB::table($table)->get();
        return view('tables.' . $table, array_merge(['rows' => $rows, 'title' => $table]));
    }
}
