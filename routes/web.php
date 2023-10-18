<?php

use App\Http\Controllers\LoginPageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationPageController;
use App\Http\Controllers\UsersTableController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\CarsTableController;
use App\Http\Controllers\MarksTableController;
use App\Http\Controllers\PartsTableController;
use App\Http\Controllers\OrdersTableController;
use App\Http\Controllers\UsedPartsTableController;
use App\Http\Controllers\OrdersController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\Operator;

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

Route::get('/', fn () =>  redirect('/home'));
Route::get(config('constants.HOME_PAGE_URL'), HomePageController::class);

Route::get(config('constants.HOME_PAGE_URL_LOGOUT_URL'), [HomePageController::class, 'logout']);

Route::get(config('constants.HOME_PAGE_URL_LOGIN'), LoginPageController::class);
Route::post(config('constants.HOME_PAGE_URL_LOGIN_ACTION'), [LoginPageController::class, 'login']);

Route::get(config('constants.HOME_PAGE_URL_REGISTER'), RegistrationPageController::class);
Route::post(config('constants.HOME_PAGE_URL_REGISTER_ACTION'), [RegistrationPageController::class, 'register']);

// Cars tables page
Route::get(config('constants.USERS_TABLE_URL'), UsersTableController::class)->middleware(Admin::class);
Route::post(config('constants.USERS_TABLE_URL'), UsersTableController::class)->middleware(Admin::class);
Route::post(config('constants.USERS_TABLE_URL_ADD'), [UsersTableController::class, 'add_user'])->middleware(Admin::class);
Route::post(config('constants.USERS_TABLE_URL_DELETE'), [UsersTableController::class, 'delete_user'])->middleware(Admin::class);
Route::post(config('constants.USERS_TABLE_URL_EDIT'), [UsersTableController::class, 'edit_user'])->middleware(Admin::class);

// Cars tables page
Route::get(config('constants.CARS_TABLE_URL'), CarsTableController::class)->middleware(Admin::class);
Route::post(config('constants.CARS_TABLE_URL'), CarsTableController::class)->middleware(Admin::class);
Route::post(config('constants.CARS_TABLE_URL_ADD'), [CarsTableController::class, 'add_user'])->middleware(Admin::class);
Route::post(config('constants.CARS_TABLE_URL_DELETE'), [CarsTableController::class, 'delete_user'])->middleware(Admin::class);
Route::post(config('constants.CARS_TABLE_URL_EDIT'), [CarsTableController::class, 'edit_user'])->middleware(Admin::class);

// Marks tables page
Route::get(config('constants.MARKS_TABLE_URL'), MarksTableController::class)->middleware(Admin::class);
Route::post(config('constants.MARKS_TABLE_URL'), MarksTableController::class)->middleware(Admin::class);
Route::post(config('constants.MARKS_TABLE_URL_ADD'), [MarksTableController::class, 'add_marks'])->middleware(Admin::class);
Route::post(config('constants.MARKS_TABLE_URL_DELETE'), [MarksTableController::class, 'delete_marks'])->middleware(Admin::class);
Route::post(config('constants.MARKS_TABLE_URL_EDIT'), [MarksTableController::class, 'edit_marks'])->middleware(Admin::class);

// Parts tables page
Route::get(config('constants.PARTS_TABLE_URL'), PartsTableController::class)->middleware(Admin::class);
Route::post(config('constants.PARTS_TABLE_URL'), PartsTableController::class)->middleware(Admin::class);
Route::post(config('constants.PARTS_TABLE_URL_ADD'), [PartsTableController::class, 'add_parts'])->middleware(Admin::class);
Route::post(config('constants.PARTS_TABLE_URL_DELETE'), [PartsTableController::class, 'delete_parts'])->middleware(Admin::class);
Route::post(config('constants.PARTS_TABLE_URL_EDIT'), [PartsTableController::class, 'edit_parts'])->middleware(Admin::class);

// Used parts tables page
Route::get(config('constants.USED_PARTS_TABLE_URL'), UsedPartsTableController::class)->middleware(Admin::class);
Route::post(config('constants.USED_PARTS_TABLE_URL'), UsedPartsTableController::class)->middleware(Admin::class);
Route::post(config('constants.USED_PARTS_TABLE_URL_ADD'), [UsedPartsTableController::class, 'add_used_part'])->middleware(Admin::class);
Route::post(config('constants.USED_PARTS_TABLE_URL_DELETE'), [UsedPartsTableController::class, 'delete_used_part'])->middleware(Admin::class);
Route::post(config('constants.USED_PARTS_TABLE_URL_EDIT'), [UsedPartsTableController::class, 'edit_used_part'])->middleware(Admin::class);

Route::get(config('constants.ORDERS_TABLE_URL'), OrdersController::class)->middleware(Operator::class);
Route::get(config('constants.ORDERS_TABLE_URL_DETAILS'), [OrdersController::class, 'index_details'])->middleware(Operator::class);
Route::post(config('constants.ORDERS_TABLE_URL_SAVE_DETAILS'), [OrdersController::class, 'save_details'])->middleware(Operator::class);
Route::post(config('constants.ORDERS_TABLE_URL'), OrdersController::class)->middleware(Operator::class);
Route::post(config('constants.ORDERS_TABLE_URL_ADD'), [OrdersController::class, 'add_order'])->middleware(Operator::class);
Route::post(config('constants.ORDERS_TABLE_URL_DELETE'), [OrdersController::class, 'delete_order'])->middleware(Operator::class);
Route::post(config('constants.ORDERS_TABLE_URL_EXTEND_SERVICES'), [OrdersController::class, 'extend_services'])->middleware(Operator::class);
Route::post(config('constants.ORDERS_TABLE_URL_EXTEND_PARTS'), [OrdersController::class, 'extend_parts'])->middleware(Operator::class);
Route::post(config('constants.EXPORT_ORDER_DOCX'), [OrdersController::class, 'OrderDocx'])->middleware(Operator::class);
