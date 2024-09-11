<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin')->name('admin')->middleware('auth')->group(function () {

    Route::prefix('dashboard')->name('.dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index']);
    });

    Route::resources([

        'banners' => BannerController::class,
    ]);

    Route::prefix('banners')->name('.banners')->group(function () {

        Route::post('change/status', [BannerController::class, 'changeStatus'])->name('change-status');
        Route::post('update/order', [BannerController::class, 'changeOrder'])->name('update-order');
    });
});
