<?php

use App\Http\Controllers\AccountsController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    /**
     * Dashboard
     */
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    /**
     * Banking Accounts
     *
     *  */
    Route::get('/accounts', [AccountsController::class, 'index'])->name('accounts.index');

    Route::post('/accounts/create', [AccountsController::class, 'create'])->name('accounts.create');

    Route::delete('/accounts/{account}', [AccountsController::class, 'destroy'])->name('accounts.destroy');

});
