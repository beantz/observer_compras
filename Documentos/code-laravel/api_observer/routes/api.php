<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('api')->apiResource('/usuario', UserController::class);
Route::post('/login', [LoginController::class, 'login']);