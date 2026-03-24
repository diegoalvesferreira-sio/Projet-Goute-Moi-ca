<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('critique/dashboard/{id}', [AuthController::class, 'dashboardCritique']);

Route::get('/admin/dashboard/{id}', [AuthController::class, 'dashboardAdmin']);

Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);