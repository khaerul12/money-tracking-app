<?php
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TransactionController::class, 'index']);
Route::post('/transactions', [TransactionController::class, 'store']);
Route::resource('transactions', TransactionController::class);

