<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\SettingsController;
use App\Http\Controllers\Backend\ShortUrlController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PermissionController;

Route::middleware('auth')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('home', 'index')->name('dashboard');
        Route::post('url-short', 'urlShort')->name('url-short.create');
    });

    Route::get('url-short', [ShortUrlController::class, 'index'])->name('url-short');

    Route::controller(SettingsController::class)->as('settings.')->group(function () {
        Route::get('settings', 'index')->name('index');
        Route::put('settings/{settings}', 'update')->name('update');
    });

    Route::resource('permissions', PermissionController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

});
