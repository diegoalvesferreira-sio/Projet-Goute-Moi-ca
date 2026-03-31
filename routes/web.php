<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\RestaurantsController;
Route::get('/restaurants', [RestaurantsController::class, 'index']);
Route::get('/restaurants/ajout', [RestaurantsController::class, 'create'])->name('restaurants.ajout.create');
Route::post('/restaurants', [RestaurantsController::class, 'store']);
Route::get('/restaurants/{id}/edit', [RestaurantsController::class, 'edit'])->name('restaurants.modif.edit');
Route::put('/restaurants/{id}', [RestaurantsController::class, 'update']);
Route::delete('/restaurants/{id}', [RestaurantsController::class, 'destroy']);

use App\Http\Controllers\VisiteController;
Route::get('/restaurants/{restaurant}/visites', [VisiteController::class, 'index'])->name('restaurants.visites.index');
Route::get('/restaurants/{restaurant}/visites/ajouter', [VisiteController::class, 'create'])->name('restaurants.visites.create');
Route::post('/restaurants/{restaurant}/visites', [VisiteController::class, 'store'])->name('restaurants.visites.store');
Route::get('/visites/{visite}', [VisiteController::class, 'show'])->name('visites.show');
Route::get('/visites/{visite}/edit', [VisiteController::class, 'edit'])->name('visites.edit');
Route::put('/visites/{visite}', [VisiteController::class, 'update'])->name('visites.update');
Route::delete('/visites/{visite}', [VisiteController::class, 'destroy'])->name('visites.destroy');
