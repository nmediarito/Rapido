<?php

use App\Http\Controllers\CustomerDashboardController;
use App\Http\Controllers\MechanicDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pricing', function () {
    return view('pricing');
});

Route::prefix('customer')->group(function () {
    Route::post('/register', [UserController::class, 'customerRegister']);
    Route::get('/home', [CustomerDashboardController::class, 'home'])->name('customer.home');
    Route::get('/submit', [CustomerDashboardController::class, 'requestView'])->name('customer.request.view');
    Route::post('/submit', [CustomerDashboardController::class, 'requestAction'])->name('customer.request.action');
    Route::get('/submissions', [CustomerDashboardController::class, 'submissions'])->name('customer.submissions');
    Route::get('/profile', [CustomerDashboardController::class, 'profileView'])->name('customer.profile.view');
    Route::put('/profile', [UserController::class, 'edit'])->name('customer.profile.action');
    Route::get('/registerVehicle', [VehicleController::class, 'registerView'])->name('customer.register.view');
    Route::post('/registerVehicle', [VehicleController::class, 'registerAction'])->name('customer.register.action');
    Route::get('/viewVehicles', [VehicleController::class, 'viewVehicles'])->name('customer.vehicles.view');
    Route::get('/login', [UserController::class, 'customerLogin']);
});

Route::prefix('mechanic')->group(function () {
    Route::post('/register', [UserController::class, 'mechanicRegister']);
    Route::get('/dashboard', [MechanicDashboardController::class, 'dashboard'])->name('mechanic.dashboard');
    Route::post('/login', [UserController::class, 'mechanicLogin']);

});

Route::prefix('signin')->group(function () {
    Route::get('/customer', function () {
        return view('signin.customer');
    });
    Route::get('/mechanic', function () {
        return view('signin.mechanic');
    });
});

Route::prefix('register')->group(function () {
    Route::get('/customer', function () {
        return view('registration.customer');
    });
    Route::get('/mechanic', function () {
        return view('registration.mechanic');
    });
});
