<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminAddUser;
use App\Http\Requests\AdminDeleteRequest;
use App\Http\Requests\AdminEditUserRequest;
use App\Http\Requests\AdminRegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Error;

class UsersTableController extends Controller
{
    public function __invoke()
    {
        $table = "users";
        $rows = DB::table($table)->get();
        return view('tables.' . $table, array_merge(['rows' => $rows, 'title' => $table]));
    }

    public function table(Request $request)
    {
        $table = DB::table($request->input('table'));
        return view('tables.table', compact($table));
    }
    public function add_user(AdminAddUser $request)
    {
        $user = User::create($request->validated());

        return redirect(config('constants.USERS_TABLE_URL'))->with('success', 'Account successfully registered!');
    }
    public function delete_user(AdminDeleteRequest $request)
    {
        $record = User::find($request->validated()['id']); // Replace $id with the primary key of the record you want to delete
        if ($record) {
            $record->delete();
            return redirect(config('constants.USERS_TABLE_URL'))->with('success', 'Account successfully registered!');
        }
        return redirect(config('constants.USERS_TABLE_URL'))->withErrors('ERRORRRR!!');
    }

    public function edit_user(AdminEditUserRequest $request)
    {
        DB::table('users')
            ->where('id', $request->input('id'))
            ->update($request->validated());
        return redirect(config('constants.USERS_TABLE_URL'))->with('success', 'Account successfully registered!');
    }
}
