<?php

use App\Http\Controllers\AdminRequestController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClientRequestController;
use App\Http\Controllers\ConsumablesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\StatementController;
use App\Http\Controllers\StuffController;
use App\Http\Controllers\UConsumableController;
use App\Http\Controllers\UServiceController;
use App\Http\Controllers\VehicleController;
use App\Models\Stuff;
use Illuminate\Support\Facades\Route;

// ---=== Pages ===---
Route::view('/', 'pages.about.index')->name('about');

Route::view('/login', 'pages.login.index')->name('login');
Route::post('/login', [ClientController::class, 'login'])->name('login-action');

Route::view('/register', 'pages.login.register')->name('register');
Route::post('/register', [ClientController::class, 'register'])->name('register-action');

Route::view('/reset', 'pages.login.register')->name('reset');

Route::get('/admin/login', LoginController::class)->name('admin.login.index');
Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.login');

Route::middleware('client')->group(
    function () { Route::put('/client/{id}', [ClientController::class, 'put'])->name('client.put'); }
);

Route::middleware('client')->group(
    function () {
        Route::view('/dashboard', 'profile')->name('dashboard');

        Route::delete('/requests', [ClientRequestController::class, 'discard'])->name('statement.discard');
        Route::post('/requests', [ClientRequestController::class, 'post'])->name('request.post');
        Route::get('/requests', ClientRequestController::class)->name('requests');

        Route::get('/vehicles', VehicleController::class)->name('vehicles');
        Route::post('/vehicles', [VehicleController::class, 'post'])->name('vehicle.post');
        Route::delete('/vehicles', [VehicleController::class, 'delete'])->name('vehicles.delete');

        Route::view('/profile', 'profile')->name('profile');
        Route::put('/profile', [ClientController::class, 'put'])->name('profile.put');
    }
);

Route::prefix('admin')->middleware('stuff:admin,operator')->group(
    function () {
        Route::get('/', AdminRequestController::class)->name('admin');

        Route::get('/statements', [StatementController::class, 'get'])->name('admin.statement.get');
        Route::post('/statements', [StatementController::class, 'post'])->name('admin.statement.post');
        Route::post('/statements/{id}', [StatementController::class, 'save'])->name('statement.save');
        Route::get('/statements/{id}', [StatementController::class, 'print'])->name('statement.print');

        Route::get('/requests', AdminRequestController::class)->name('pages.admin.requests.index');

        /*
         * Add/Remove consumable/service in statement
         *
        */
        Route::get('/used_consumables/{id}/{statement_id}', [UConsumableController::class, 'put'])->name(
            'uconsumable.put'
        );
        Route::delete('/used_consumables/{id}', [UConsumableController::class, 'delete'])->name('uconsumable.delete');

        Route::get('/used_services/{id}/{statement_id}', [UServiceController::class, 'put'])->name('uservice.put');
        Route::delete('/used_services/{id}', [UServiceController::class, 'delete'])->name('uservice.delete');

        /*
         * Handbooks endpoints
        */
        Route::get('/stuff', StuffController::class)->name('admin.stuff');
        Route::post('/stuff', [StuffController::class, 'post'])->name('admin.stuff.post');
        Route::put('/stuff/{id}', [StuffController::class, 'put'])->name('admin.stuff.put');
        Route::delete('/stuff/{id}', [StuffController::class, 'delete'])->name('admin.stuff.delete');

        Route::get('/vehicles', VehicleController::class)->name('admin.vehicles');
        Route::post('/vehicles', [VehicleController::class, 'post'])->name('admin.vehicles.post');
        Route::put('/vehicles/{id}', [VehicleController::class, 'put'])->name('admin.vehicles.put');
        Route::delete('/vehicles/{id}', [VehicleController::class, 'delete'])->name('admin.vehicles.delete');

        Route::get('/services', ServicesController::class)->name('admin.services');
        Route::post('/services', [ServicesController::class, 'post'])->name('admin.services.post');
        Route::put('/services/{id}', [ServicesController::class, 'put'])->name('admin.service.put');
        Route::delete('/services/{id}', [ServicesController::class, 'delete'])->name('admin.service.delete');

        Route::get('/consumables', ConsumablesController::class)->name('admin.consumables');
        Route::post('/consumables', [ConsumablesController::class, 'post'])->name('admin.consumables.post');
        Route::put('/consumables/{id}', [ConsumablesController::class, 'put'])->name('admin.consumable.put');
        Route::delete('/consumables/{id}', [ConsumablesController::class, 'delete'])->name('admin.consumable.delete');

        Route::get('/clients', ClientController::class)->name('admin.clients');
        Route::post('/clients', [ClientController::class, 'post'])->name('admin.clients.post');
        Route::put('/clients/{id}', [ClientController::class, 'put'])->name('admin.user.put');
        Route::delete('/clients/{id}', [ClientController::class, 'delete'])->name('admin.user.delete');

        Route::get('/reports/statistic', [ReportsController::class, 'Static'])->name('admin.report.statistic');
        Route::get('/reports/dynamic', [ReportsController::class, 'Dynamic'])->name('admin.report.dynamic');


    }
);

Route::get(
    '/create-admin',
    function () {
        Stuff::create(
            [
                'first_name' => 'Админ',
                'last_name' => "Админов",
                'second_name' => "Админович",
                'email' => "admin@gmail.com",
                'password' => "Pa\$\$w0rd",
                'role' => 'admin',
            ]
        );
    }
);

Route::get('/logout', [ClientController::class, 'logout'])->name('logout');

/* HTTP Errors */
Route::view('/404', '404')->name('404');
Route::view('/403', '403')->name('403');

Route::view("/test-some", "components.layout.center");
Route::view("/test-base", "components.layout.base");
