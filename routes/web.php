<?php

use App\Http\Controllers\Auth\MechanicController;
use App\Http\Controllers\BalanceController;
use App\Http\Controllers\CustomerDashboardController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\MechanicBalanceController;
use App\Http\Controllers\MechanicDashboardController;
use App\Http\Controllers\MembershipController;
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
})->name('welcome');

Route::get('/pricing', function () {
    return view('pricing');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/services', function () {
    return view('services');
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

//Customer
Route::prefix('customer')->group(function () {
    //Login and registration
    Route::get('/login', [UserController::class, 'loginView'])->name('customer.login.view');
    Route::post('/login', [UserController::class, 'loginAction'])->name('customer.login.action');
    Route::get('/logout', [UserController::class, 'logout'])->name('customer.logout');
    Route::get('/registration', [UserController::class, 'registerView'])->name('customer.registration.view');
    Route::post('/registration', [UserController::class, 'registerAction'])->name('customer.registration.action');

    //Dashboard
    Route::get('/home', [CustomerDashboardController::class, 'home'])->name('customer.home');
    Route::get('/submit', [CustomerDashboardController::class, 'requestView'])->name('customer.request.view');
    Route::post('/submit', [CustomerDashboardController::class, 'requestAction'])->name('customer.request.action');
    Route::get('/submissions', [CustomerDashboardController::class, 'submissions'])->name('customer.submissions');
    Route::get('/history', [CustomerDashboardController::class, 'calloutHistory'])->name('customer.history');
    Route::get('/profile', [CustomerDashboardController::class, 'profileView'])->name('customer.profile.view');
    Route::get('/rate/{mechanicId}', [CustomerDashboardController::class, 'rateView'])->name('rate.view');
    Route::post('/rate/{mechanicId}', [CustomerDashboardController::class, 'rateAction'])->name('rate.action');
    Route::put('/profile', [UserController::class, 'edit'])->name('customer.profile.action');

    //Membership
    Route::get('/registerMembership', [MembershipController::class, 'registerMembershipView'])->name('membership.register.view');
    Route::put('/registerMembership', [MembershipController::class, 'registerMembershipAction'])->name('membership.register.action');

    //Balance
    Route::get('/balance', [BalanceController::class, 'balanceView'])->name('balance.view');
    Route::put('/balance/deposit', [BalanceController::class, 'deposit'])->name('balance.deposit');
    Route::put('/balance/withdraw', [BalanceController::class, 'withdraw'])->name('balance.withdraw');
    Route::get('/balance/view', [BalanceController::class, 'bankView'])->name('bank.view');
    Route::get('/job/invoices/view', [BalanceController::class, 'jobInvoices'])->name('job.invoices.view');
    Route::post('/balance/add', [BalanceController::class, 'bankAdd'])->name('bank.add');
    Route::put('/balance/edit', [BalanceController::class, 'bankEdit'])->name('bank.edit');

    //Vehicle
    Route::get('/registerVehicle', [VehicleController::class, 'registerView'])->name('customer.register.view');
    Route::post('/registerVehicle', [VehicleController::class, 'registerAction'])->name('customer.register.action');
    Route::get('/viewVehicles', [VehicleController::class, 'viewVehicles'])->name('customer.vehicles.view');

});



//Mechanic
Route::prefix('mechanic')->group(function () {
    //Login and registration
    Route::get('/login', [MechanicController::class, 'loginView'])->name('mechanic.login.view');
    Route::post('/login', [MechanicController::class, 'loginAction'])->name('mechanic.login.action');
    Route::get('/logout', [MechanicController::class, 'logout'])->name('mechanic.logout');
    Route::get('/registration', [MechanicController::class, 'registerView'])->name('mechanic.registration.view');
    Route::post('/registration', [MechanicController::class, 'registerAction'])->name('mechanic.registration.action');

    //Dashboard
    Route::get('/home', [MechanicDashboardController::class, 'home'])->name('mechanic.home');
    Route::get('/history', [MechanicDashboardController::class, 'history'])->name('mechanic.jobs.history');
    Route::get('/jobs', [MechanicDashboardController::class, 'availableJobs'])->name('mechanic.available.jobs');
    Route::get('/acceptedjobs', [MechanicDashboardController::class, 'acceptedJobs'])->name('mechanic.accepted.jobs');
    Route::get('/profile', [MechanicDashboardController::class, 'profileView'])->name('mechanic.profile.view');
    Route::put('/profile', [MechanicController::class, 'edit'])->name('mechanic.profile.action');
    Route::get('/ratings', [MechanicDashboardController::class, 'ratingsView'])->name('mechanic.ratings');

    //Balance
    Route::get('/balance', [MechanicBalanceController::class, 'balanceView'])->name('balance.view.mechanic');
    Route::put('/balance/deposit', [MechanicBalanceController::class, 'deposit'])->name('balance.deposit.mechanic');
    Route::put('/balance/withdraw', [MechanicBalanceController::class, 'withdraw'])->name('balance.withdraw.mechanic');
    Route::get('/balance/view', [MechanicBalanceController::class, 'bankView'])->name('bank.view.mechanic');
    Route::post('/balance/add', [MechanicBalanceController::class, 'bankAdd'])->name('bank.add.mechanic');
    Route::put('/balance/edit', [MechanicBalanceController::class, 'bankEdit'])->name('bank.edit.mechanic');
});

//Jobs
Route::prefix('job')->group(function () {
    Route::get('/accept/{id}', [JobController::class, 'accept'])->name('job.accept');
    Route::get('/complete/{id}', [JobController::class, 'complete'])->name('job.complete');
    Route::get('/cancel/{id}', [JobController::class, 'cancel'])->name('job.cancel');
});
