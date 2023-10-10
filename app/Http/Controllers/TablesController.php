<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminDeleteRequest;
use App\Http\Requests\AdminEditUserRequest;
use App\Http\Requests\AdminRegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

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

    public function add_user(AdminRegisterRequest $request)
    {
        $user = User::create($request->validated());

        // auth()->login($user);

        return redirect('/tables')->with('success', 'Account successfully registered!');
    }
    public function delete_user(AdminDeleteRequest $request)
    {
        $record = User::find($request->validated()['id']); // Replace $id with the primary key of the record you want to delete
        if ($record) {
            $record->delete();
            return redirect('/tables')->with('success', 'Account successfully registered!');
        }
        return redirect('/tables')->withErrors('ERRORRRR!!');
    }

    public function edit_user(Request $request)
    {
        $vars = $request->except('_token');
        if (!isset($vars['active'])) {
            $vars['active'] = "0";
        }
        if (!isset($vars['is_admin'])) {
            $vars['is_admin'] = "0";
        }

        $record = User::find($request->all()['id']); // Replace $id with the primary key of the record you want to delete
        DB::table('users')
            ->where('id', $request->input('id'))
            ->update($vars);
        return redirect('/tables')->with('success', 'Account successfully registered!');
    }
}
