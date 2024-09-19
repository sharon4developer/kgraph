<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ServiceFaqController;
use App\Http\Controllers\Admin\ServicePointController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.pages.home');
});

Route::get('contact-us', function () {
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
        'services' => ServiceController::class,
        'service-points' => ServicePointController::class,
        'service-faq' => ServiceFaqController::class,
    ]);

    Route::prefix('banners')->name('.banners')->group(function () {

        Route::post('change/status', [BannerController::class, 'changeStatus'])->name('change-status');
        Route::post('update/order', [BannerController::class, 'changeOrder'])->name('update-order');
    });

    Route::prefix('services')->name('.services')->group(function () {

        Route::post('change/status', [ServiceController::class, 'changeStatus'])->name('change-status');
        Route::post('update/order', [ServiceController::class, 'changeOrder'])->name('update-order');
    });

    Route::prefix('service-points')->name('.service-points')->group(function () {

        Route::post('change/status', [ServicePointController::class, 'changeStatus'])->name('change-status');
        Route::post('update/order', [ServicePointController::class, 'changeOrder'])->name('update-order');
    });

    Route::prefix('service-faq')->name('.service-faq')->group(function () {

        Route::post('change/status', [ServiceFaqController::class, 'changeStatus'])->name('change-status');
        Route::post('update/order', [ServiceFaqController::class, 'changeOrder'])->name('update-order');
    });
});
