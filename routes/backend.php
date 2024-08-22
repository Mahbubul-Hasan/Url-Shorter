<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;

Route::middleware('auth')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('home', 'index')->name('dashboard');
        Route::post('url-short', 'urlShort')->name('url-short.create');
    });
});
