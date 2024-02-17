<?php

use App\Http\Controllers\ConsumablesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\StatementController;
use App\Http\Controllers\StuffController;
use App\Http\Controllers\UConsumableController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UServiceController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\WorkshopsController;
use Illuminate\Support\Facades\Route;

// ---=== Pages ===---
Route::view('/about', 'about')->name('about');


Route::middleware('guest')->group(function () {
    Route::redirect('/', '/about');

    Route::view('/signin', 'signin')->name('signin');
    Route::post('/signin', [UserController::class, 'signin'])->name('signin');

    Route::view('/signup', 'register')->name('signup');
    Route::post('/signup', [UserController::class, 'signup'])->name('signup');

    Route::view('/reset', 'register')->name('reset');
});

Route::middleware('auth')->group(function() {
    Route::put('/user/{uuid}', [UserController::class, 'put'])->name('user.put');
});


Route::middleware('role:client')->group(function () {
    Route::view('/dashboard', 'profile')->name('dashboard');

    Route::get('/profile', [UserController::class, 'get'])->name('profile');
    Route::put('/profile', [UserController::class, 'put'])->name('profile.put');

});


Route::prefix('admin')->middleware('role:admin,operator')->group(function () {
    Route::get('/', DashBoardController::class)->name('admin.dashboard');

    Route::get('/statements', StatementController::class)->name('admin.statements');
    Route::get('/statements/{uuid}', [StatementController::class, 'get'])->name('statement.get');
    Route::post('/statements/{request_uuid}', [StatementController::class, 'post'])->name('statement.post');
    Route::put('/statements/{uuid}', [StatementController::class, 'put'])->name('statement.put');

    Route::get('/vehicles', VehicleController::class)->name('admin.vehicles');
    Route::get('/vehicles/{uuid}', [VehicleController::class, 'get'])->name('vehicle.get');
    Route::put('/vehicles/{uuid}', [VehicleController::class, 'put'])->name('vehicle.put');

    Route::get('/used_consumables', UConsumableController::class)->name('admin.uconsumables');
    Route::get('/used_consumables/{uuid}', [UConsumableController::class, 'get'])->name('uconsumable.get');
    Route::get('/used_consumables/{uuid}/{statement_uuid}', [UConsumableController::class, 'put'])
        ->name('uconsumable.put');
    Route::delete('/used_consumables/{uuid}', [UConsumableController::class, 'delete'])->name('uconsumable.delete');

    Route::get('/used_services', UServiceController::class)->name('admin.uservices');
    Route::get('/used_services/{uuid}', [UServiceController::class, 'get'])->name('uservice.get');
    Route::get('/used_services/{uuid}/{statement_uuid}', [UServiceController::class, 'put'])->name('uservice.put');
    Route::delete('/used_services/{uuid}', [UServiceController::class, 'delete'])->name('uservice.delete');

    Route::get('/models', [ModelController::class])->name('admin.models');
    Route::get('/models/{id}', [ModelController::class, 'get'])->name('model.get');
    Route::put('/models/{uuid}', [ModelController::class, 'put'])->name('model.put');

    Route::get('/marks', [MarkController::class])->name('admin.marks');
    Route::get('/marks/{id}', [MarkController::class, 'get'])->name('mark.get');
    Route::put('/marks/{uuid}', [MarkController::class, 'put'])->name('mark.put');

    Route::get('/stuff', [StuffController::class])->name('admin.stuff');
    Route::get('/stuff/{id}', [StuffController::class, 'get'])->name('stuff.get');
    Route::put('/stuff/{uuid}', [StuffController::class, 'put'])->name('stuff.put');

    Route::get('/workshops', [WorkshopsController::class])->name('admin.workshops');
    Route::get('/workshops/{id}', [WorkshopsController::class, 'get'])->name('workshop.get');
    Route::put('/workshops/{uuid}', [WorkshopsController::class, 'put'])->name('workshop.put');

    Route::get('/services', ServicesController::class)->name('admin.services');
    Route::get('/services/{id}', [ServicesController::class, 'get'])->name('service.get');
    Route::put('/services/{uuid}', [ServicesController::class, 'put'])->name('service.put');

    Route::get('/consumables', ConsumablesController::class)->name('admin.consumables');
    Route::get('/consumables/{id}', [ConsumablesController::class, 'get'])->name('consumable.get');
    Route::put('/consumables/{uuid}', [ConsumablesController::class, 'put'])->name('consumable.put');

    Route::get('/users', UserController::class)->name('admin.users');
    Route::get('/users/{uuid}', [UserController::class, 'get'])->name('user.get');
    Route::put('/users/{uuid}', [UserController::class, 'put'])->name('user.put');
});


Route::get('/logout', [UserController::class, 'logout'])->name('logout');

/* HTTP Errors */
Route::view('/404', '404')->name('404');
Route::view('/403', '403')->name('403');