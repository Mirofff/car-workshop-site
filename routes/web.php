<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\TablesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/", function () {
    $users = DB::table('users')->get();
    return view('home', ['user' => $users->first(), 'title' => 'Home']);
});

Route::get('/register', RegistrationController::class);
Route::post('/register-action', [RegistrationController::class, 'register']);

Route::get('/login', LoginController::class);
Route::post('/login-action', [LoginController::class, 'login']);

Route::get('/tables', TablesController::class)->middleware('auth');
Route::post('/tables', TablesController::class)->middleware('auth');
Route::post('/add-user', [TablesController::class, 'add_user'])->middleware('auth');
Route::post('/delete-user', [TablesController::class, 'delete_user'])->middleware('auth');
Route::post('/edit-user', [TablesController::class, 'edit_user'])->middleware('auth');

Route::get('/cars', function () {
    return view('tables.cars');
});
