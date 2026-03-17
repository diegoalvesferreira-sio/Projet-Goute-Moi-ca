<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\RestaurantsController;
Route::get('/restaurants', [RestaurantsController::class, 'index']);
Route::get('/restaurants/ajout', [RestaurantsController::class, 'create']);
Route::post('/restaurants', [RestaurantsController::class, 'store']);
Route::get('/restaurants/{id}/edit', [RestaurantsController::class, 'edit']);
Route::put('/restaurants/{id}', [RestaurantsController::class, 'update']);
Route::delete('/restaurants/{id}', [RestaurantsController::class, 'destroy']);

