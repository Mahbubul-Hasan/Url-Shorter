<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', [TestController::class, 'index'])->name('test');

Route::controller(HomeController::class)->group(function () {
    Route::get('/{shortUrl:url_code}', 'redirectUrl')->name('redirectUrl');
});
