<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.pages.home');
});

Route::get('contact-us', function () {
    return view('main');
});

Route::get('about-us', function () {
    return view('frontend.pages.about');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin')->name('admin')->middleware('auth')->group(function () {

    Route::prefix('dashboard')->name('.dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index']);
    });

    Route::resources([

        'banners' => BannerController::class,
        'services' => ServiceController::class,
    ]);

    Route::prefix('banners')->name('.banners')->group(function () {

        Route::post('change/status', [BannerController::class, 'changeStatus'])->name('change-status');
        Route::post('update/order', [BannerController::class, 'changeOrder'])->name('update-order');
    });

    Route::prefix('services')->name('.services')->group(function () {

        Route::post('change/status', [ServiceController::class, 'changeStatus'])->name('change-status');
        Route::post('update/order', [ServiceController::class, 'changeOrder'])->name('update-order');
    });
});
