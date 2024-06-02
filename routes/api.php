<?php

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
        $resp = Statement::where('pickup_time', '>=', $req->currentDatetime)
                         ->get(['pickup_date', 'pickup_time'])
                         ->toArray();
        return $resp;
    }
)->name('api.requests.pickup');
