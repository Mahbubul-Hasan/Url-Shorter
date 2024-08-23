<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', [TestController::class, 'index'])->name('test');

Auth::routes();

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'landingPage')->name('landingPage');
    Route::get('/home', 'index')->name('home');
    Route::post('url-short', 'urlShort')->name('url-short.create');
    Route::get('/{shortUrl:url_code}', 'redirectUrl')->name('redirectUrl');
});
