<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\TablesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TableCarController;
use App\Http\Controllers\TableUserController;
use App\Http\Middleware\Admin;

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

Route::get("/", HomeController::class);

Route::get('/register', RegistrationController::class);
Route::post('/register-action', [RegistrationController::class, 'register']);

Route::get('/login', LoginController::class);
Route::post('/login-action', [LoginController::class, 'login']);

Route::get('/tables', TablesController::class)->middleware(Admin::class);
Route::post('/tables', TablesController::class)->middleware(Admin::class);

Route::post('/add-user', [TablesController::class, 'add_user'])->middleware(Admin::class);
Route::post('/delete-user', [TablesController::class, 'delete_user'])->middleware(Admin::class);
Route::post('/edit-user', [TablesController::class, 'edit_user'])->middleware(Admin::class);

// Route::get('/tables/cars')
Route::get(config('constants.USERS_TABLE_URL'), TableUserController::class);
Route::get(config('constants.CARS_TABLE_URL'), TableCarController::class);
// Route::get('/tables/cars')
// Route::get('/tables/cars')

Route::get('/cars', function () {
    return view('tables.cars');
})->middleware(Admin::class);
