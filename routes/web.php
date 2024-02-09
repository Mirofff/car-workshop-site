<?php

use App\Http\Controllers\ConsumablesController;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\RequestController;
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

    Route::view('/login', 'login')->name('login');
    Route::post('/login', [UserController::class, 'signin'])->name('login');

    Route::view('/signup', 'register')->name('signup');
    Route::post('/signup', [UserController::class, 'signup'])->name('signup');
});

Route::middleware('role:client')->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::get('/profile', [UserController::class, 'get'])->name('profile');
    Route::put('/profile', [UserController::class, 'put'])->name('profile.put');

    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});


Route::prefix('panel')->middleware('role:admin,operator')->group(function () {
    Route::get('/', RequestController::class)->name('panel.panel');

    Route::get('/statements', StatementController::class)->name('panel.statements');
    Route::get('/statements/{id}', [StatementController::class, 'get'])->name('statement.get');
    Route::put('/statements/{uuid}', [StatementController::class, 'put'])->name('statement.put');

    Route::get('/vehicles', VehicleController::class)->name('panel.vehicles');
    Route::get('/vehicles/{id}', [VehicleController::class, 'get'])->name('vehicle.get');
    Route::put('/vehicles/{uuid}', [VehicleController::class, 'put'])->name('vehicle.put');

    Route::get('/used_consumables', UConsumableController::class)->name('panel.uconsumables');
    Route::get('/used_consumables/{id}', [UConsumableController::class, 'get'])->name('uconsumable.get');
    Route::put('/used_consumables/{uuid}', [UConsumableController::class, 'put'])->name('uconsumable.put');

    Route::get('/used_services', UServiceController::class)->name('panel.uservices');
    Route::get('/used_services/{id}', [UServiceController::class, 'get'])->name('uservice.get');
    Route::put('/used_services/{uuid}', [UServiceController::class, 'put'])->name('uservice.put');
});

Route::prefix('panel')->middleware('role:admin')->group(function () {
    Route::get('/models', [ModelController::class])->name('panel.models');
    Route::get('/models/{id}', [ModelController::class, 'get'])->name('model.get');
    Route::put('/models/{uuid}', [ModelController::class, 'put'])->name('model.put');

    Route::get('/marks', [MarkController::class])->name('panel.marks');
    Route::get('/marks/{id}', [MarkController::class, 'get'])->name('mark.get');
    Route::put('/marks/{uuid}', [MarkController::class, 'put'])->name('mark.put');

    Route::get('/stuff', [StuffController::class])->name('panel.stuff');
    Route::get('/stuff/{id}', [StuffController::class, 'get'])->name('stuff.get');
    Route::put('/stuff/{uuid}', [StuffController::class, 'put'])->name('stuff.put');

    Route::get('/workshops', [WorkshopsController::class])->name('panel.workshops');
    Route::get('/workshops/{id}', [WorkshopsController::class, 'get'])->name('workshop.get');
    Route::put('/workshops/{uuid}', [WorkshopsController::class, 'put'])->name('workshop.put');

    Route::get('/services', ServicesController::class)->name('panel.services');
    Route::get('/services/{id}', [ServicesController::class, 'get'])->name('service.get');
    Route::put('/services/{uuid}', [ServicesController::class, 'put'])->name('service.put');

    Route::get('/consumables', ConsumablesController::class)->name('panel.consumables');
    Route::get('/consumables/{id}', [ConsumablesController::class, 'get'])->name('service.get');
    Route::put('/consumables/{uuid}', [ConsumablesController::class, 'put'])->name('service.put');

    Route::get('/users', UserController::class)->name('panel.users');
    Route::get('/users/{uuid}', [UserController::class, 'get'])->name('user.get');
    Route::put('/users/{uuid}', [UserController::class, 'put'])->name('user.put');
});


/* HTTP Errors */
Route::view('/404', '404')->name('404');
Route::view('/403', '403')->name('403');