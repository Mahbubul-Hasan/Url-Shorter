<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\AuthenticationController;

Route::match(['get', 'post'], 'login', [AuthenticationController::class, 'login'])->name('login');

// Route::middleware('auth')->group(
// function () {
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
// }
// );
