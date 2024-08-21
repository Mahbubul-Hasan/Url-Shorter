<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\AuthenticationController;

Route::match(['get', 'post'], 'login', [AuthenticationController::class, 'login'])->name('login');

// Route::middleware('auth')->group(
// function () {
Route::controller(DashboardController::class)->group(function () {
    Route::get('home', 'index')->name('dashboard');
    Route::post('url-short', 'urlShort')->name('url-short.create');
});
// }
// );
