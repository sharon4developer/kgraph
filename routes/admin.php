<?php

use App\Http\Controllers\Admin\AdminLoginController;
use Illuminate\Support\Facades\Route;

//Login
Route::post('login', [AdminLoginController::class, 'login']);

