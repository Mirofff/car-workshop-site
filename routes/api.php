<?php

use App\Enums\StatementStatus;
use App\Models\Model;
use App\Models\Statement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get(
    '/user',
    function (Request $request) {
        return $request->user();
    }
);

Route::get(
    "/models",
    function (Request $req) {
        $all = Model::whereMarkId($req->markId)->orderBy("name")->get();
        return $all;
    }
)->name('api.models');

Route::get(
    "/requests/datetime",
    function (Request $req) {
        $query = Statement::whereStatus(StatementStatus::NotComplete->value)
                          ->where('pickup_date', '=', $req->pickupDate)
                          ->groupBy('pickup_date')->havingRaw(
                "count(pickup_date) > (select count(*) from stuff where role = 'operator')"
            );

        return $query->get(['pickup_time'])->toArray();
    }
)->name('api.requests.pickup');
