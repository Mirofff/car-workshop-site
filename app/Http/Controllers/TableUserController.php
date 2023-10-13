<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminAddUser;
use App\Http\Requests\AdminDeleteRequest;
use App\Http\Requests\AdminEditUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TableUserController extends Controller
{
    public function __invoke()
    {
        $rows = DB::table('users')->get();
        return view('tables.users', array_merge(['rows' => $rows, 'title' => 'users']));
    }

    public function table(Request $request)
    {
        $table = DB::table($request->input('table'));
        return view('tables.table', compact($table));
    }

    public function add_user(AdminAddUser $request)
    {
        $user = User::create($request->validated());

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

    public function edit_user(AdminEditUserRequest $request)
    {
        DB::table('users')
            ->where('id', $request->input('id'))
            ->update($request->validated());
        return redirect('/tables')->with('success', 'Account successfully registered!');
    }
}
