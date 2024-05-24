<?php

use App\Http\Controllers\AdminRequestController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClientRequestController;
use App\Http\Controllers\ConsumablesController;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\ModelController;
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
Route::redirect("/", "about");
Route::view('/about', 'pages.about.index')->name('about');

Route::view('/login', 'pages.login.index')->name('login');
Route::post('/login', [ClientController::class, 'login'])->name('login-action');

Route::view('/register', 'pages.login.register')->name('register');
Route::post('/register', [ClientController::class, 'register'])->name('register-action');

Route::view('/reset', 'pages.login.register')->name('reset');

Route::get('/admin/login', StuffController::class)->name('admin.login.index');
Route::post('/admin/login', [StuffController::class, 'login'])->name('admin.login');


Route::middleware('client')->group(
    function () { Route::put('/client/{id}', [ClientController::class, 'put'])->name('client.put'); }
);


Route::middleware('client')->group(
    function () {
        Route::redirect('/', '/requests');
        Route::view('/dashboard', 'profile')->name('dashboard');

        Route::delete('/requests', [ClientRequestController::class, 'discard'])->name('statement.discard');
        Route::post('/requests', [ClientRequestController::class, 'post'])->name('request.post');
        Route::get('/requests', ClientRequestController::class)->name('requests');

        Route::get('/vehicles', VehicleController::class)->name('vehicles');
        Route::post('/vehicles', [VehicleController::class, 'post'])->name('vehicle.post');

        Route::view('/profile', 'profile')->name('profile');
        Route::put('/profile', [ClientController::class, 'put'])->name('profile.put');
    }
);


Route::prefix('admin')->middleware('stuff')->group(
    function () {
        Route::get('/', AdminRequestController::class)->name('admin');

        Route::get('/statements', [StatementController::class, 'get'])->name('admin.statement.get');
        Route::post('/statements', [StatementController::class, 'post'])->name('admin.statement.post');
        Route::post('/statements/{id}', [StatementController::class, 'save'])->name('statement.save');
        Route::get('/statements/{id}', [StatementController::class, 'print'])->name('statement.print');

        Route::get('/requests', AdminRequestController::class)->name('pages.admin.requests.index');

        Route::get('/vehicles', VehicleController::class)->name('admin.vehicles');
        Route::get('/vehicles/{id}', [VehicleController::class, 'get'])->name('vehicle.get');
        Route::put('/vehicles/{id}', [VehicleController::class, 'put'])->name('vehicle.put');

        Route::get('/used_consumables', UConsumableController::class)->name('admin.uconsumables');
        Route::get('/used_consumables/{id}', [UConsumableController::class, 'get'])->name('uconsumable.get');
        Route::get('/used_consumables/{id}/{statement_id}', [UConsumableController::class, 'put'])
             ->name('uconsumable.put');
        Route::delete('/used_consumables/{id}', [UConsumableController::class, 'delete'])->name('uconsumable.delete');

        Route::get('/used_services', UServiceController::class)->name('admin.uservices');
        Route::get('/used_services/{id}', [UServiceController::class, 'get'])->name('uservice.get');
        Route::get('/used_services/{id}/{statement_id}', [UServiceController::class, 'put'])->name('uservice.put');
        Route::delete('/used_services/{id}', [UServiceController::class, 'delete'])->name('uservice.delete');

        Route::get('/models', [ModelController::class])->name('admin.models');
        Route::get('/models/{id}', [ModelController::class, 'get'])->name('model.get');
        Route::put('/models/{id}', [ModelController::class, 'put'])->name('model.put');

        Route::get('/marks', [MarkController::class])->name('admin.marks');
        Route::get('/marks/{id}', [MarkController::class, 'get'])->name('mark.get');
        Route::put('/marks/{id}', [MarkController::class, 'put'])->name('mark.put');

        Route::get('/stuff', [StuffController::class])->name('admin.stuff');
        Route::get('/stuff/{id}', [StuffController::class, 'get'])->name('stuff.get');
        Route::put('/stuff/{id}', [StuffController::class, 'put'])->name('stuff.put');

        Route::get('/services/{id?}', ServicesController::class)->name('admin.services');
        Route::put('/services/{id?}', [ServicesController::class, 'put'])->name('service.put');

        Route::get('/consumables/{id?}', ConsumablesController::class)->name('admin.consumables');
        Route::put('/consumables/{id?}', [ConsumablesController::class, 'put'])->name('consumable.put');

        Route::get('/users', ClientController::class)->name('admin.users');
        Route::get('/users/{id}', [ClientController::class, 'get'])->name('user.get');
        Route::put('/users/{id}', [ClientController::class, 'put'])->name('user.put');

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
