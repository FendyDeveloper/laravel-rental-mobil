<?php

use App\Http\Controllers;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', Controllers\WelcomeController::class)->name('welcome');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/dashboard', [Controllers\DashboardController::class, 'index'])->name('dashboard');
    
    Route::resource('users', Controllers\UserController::class)->middleware(CheckRole::class.':admin');
    Route::resource('cars', Controllers\CarController::class)->middleware(CheckRole::class.':admin,petugas');
    Route::get('/transactions/pdf', [Controllers\TransactionController::class, 'exportPdf'])->name('transactions.exportPdf')->middleware(CheckRole::class.':admin,petugas');
    Route::resource('transactions', Controllers\TransactionController::class)->middleware(CheckRole::class.':user,admin,petugas');
    // Route::get('/transactions/show/{transaction}', [Controllers\TransactionController::class, 'show'])->name('transactions.show')->middleware(CheckRole::class.':user');
    Route::get('payments/create/{payment}', [Controllers\PaymentController::class, 'create'])->name('payments.create')->middleware(CheckRole::class.':admin,petugas');
    Route::resource('returns', Controllers\ReturnController::class)->middleware(CheckRole::class.':admin,petugas');
    Route::resource('payments', Controllers\PaymentController::class)->middleware(CheckRole::class.':admin,petugas');
    
    
});
Route::middleware(['auth'])->group(function () {
    Route::resource('orders', Controllers\OrderController::class)->middleware(CheckRole::class.':user,admin,petugas');
});
require __DIR__.'/auth.php';
