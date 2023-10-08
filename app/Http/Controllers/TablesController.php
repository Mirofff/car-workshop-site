<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class TablesController extends Controller
{
    public function __invoke()
    {
        $users = DB::table('users')->get();

        return view('tables.users', array_merge(['users' => $users, 'title' => 'Users']));
    }

    public function table(Request $request)
    {
        $table = DB::table($request->input('table'));
        return view('tables.table', compact($table));
    }
}
