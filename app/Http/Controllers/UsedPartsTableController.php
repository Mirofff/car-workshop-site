<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsedPartsTableController extends Controller
{
    public function __invoke()
    {
        $table = "used_parts";
        $rows = DB::table($table)->get();
        return view('tables' . $table, array_merge(['rows' => $rows, 'title' => $table]));
    }
}
