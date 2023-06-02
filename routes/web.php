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
    // Index
    Route::get('/accounts', [AccountsController::class, 'index'])->name('accounts.index');

    // Create
    Route::post('/accounts/create', [AccountsController::class, 'create'])->name('accounts.create');

    // Show
    Route::get('/accounts/{id}', [AccountsController::class, 'show'])->name('accounts.show');

    // Edit
    Route::get('/accounts/{id}/edit', [AccountsController::class, 'edit'])->name('accounts.edit');
    // Update
    Route::put('/accounts/{id}', [AccountsController::class, 'update'])->name('accounts.update');

    // Delete
    Route::delete('/accounts/{account}', [AccountsController::class, 'destroy'])->name('accounts.destroy');

});
