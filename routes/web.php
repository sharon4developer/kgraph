<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin')->name('admin')->middleware('auth')->group(function () {

    Route::prefix('dashboard')->name('.dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index']);
    });
});
