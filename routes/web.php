<?php
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Public routes
Route::get('/', [TransactionController::class, 'index']);
Route::post('/transactions', [TransactionController::class, 'store']);

// Authentication routes
Auth::routes();

// Protected routes (only accessible to authenticated users)
Route::group(['middleware' => 'auth'], function () {
    Route::resource('transactions', TransactionController::class);
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});