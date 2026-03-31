<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisiteController;
use App\Http\Controllers\RestaurantsController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/restaurants', [RestaurantsController::class, 'index']);
Route::get('/restaurants/ajout', [RestaurantsController::class, 'create']);
Route::post('/restaurants', [RestaurantsController::class, 'store']);
Route::get('/restaurants/{id}/edit', [RestaurantsController::class, 'edit']);
Route::put('/restaurants/{id}', [RestaurantsController::class, 'update']);
Route::delete('/restaurants/{id}', [RestaurantsController::class, 'destroy']);


Route::get('/restaurants/{restaurant}/visites', [VisiteController::class, 'index'])->name('restaurants.visites.index');
Route::get('/restaurants/{restaurant}/visites/ajouter', [VisiteController::class, 'create'])->name('restaurants.visites.create');
Route::post('/restaurants/{restaurant}/visites', [VisiteController::class, 'store'])->name('restaurants.visites.store');
Route::get('/visites/{visite}', [VisiteController::class, 'show'])->name('visites.show');
Route::get('/visites/{visite}/edit', [VisiteController::class, 'edit'])->name('visites.edit');
Route::put('/visites/{visite}', [VisiteController::class, 'update'])->name('visites.update');
Route::delete('/visites/{visite}', [VisiteController::class, 'destroy'])->name('visites.destroy');

Route::get('/restaurants', [RestaurantsController::class, 'index']);
Route::get('/restaurants/ajout', [RestaurantsController::class, 'create']);
Route::post('/restaurants', [RestaurantsController::class, 'store']);
Route::get('/restaurants/{id}/edit', [RestaurantsController::class, 'edit']);
Route::put('/restaurants/{id}', [RestaurantsController::class, 'update']);
Route::delete('/restaurants/{id}', [RestaurantsController::class, 'destroy']);

Route::get('/restaurants/{restaurant}/visites', [VisiteController::class, 'index'])->name('restaurants.visites.index');
Route::get('/restaurants/{restaurant}/visites/ajouter', [VisiteController::class, 'create'])->name('restaurants.visites.create');
Route::post('/restaurants/{restaurant}/visites', [VisiteController::class, 'store'])->name('restaurants.visites.store');
Route::get('/visites/{visite}', [VisiteController::class, 'show'])->name('visites.show');
Route::get('/visites/{visite}/edit', [VisiteController::class, 'edit'])->name('visites.edit');
Route::put('/visites/{visite}', [VisiteController::class, 'update'])->name('visites.update');
Route::delete('/visites/{visite}', [VisiteController::class, 'destroy'])->name('visites.destroy');

Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/register',  [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('isAdmin')->group(function () {
    Route::get('/admin/dashboard/{id}', [AuthController::class, 'dashboardAdmin']);
    Route::get('/admin/gestion-critiques', [AdminController::class, 'listeCritiques']);
    Route::delete('/admin/gestion-critiques/{id}', [AdminController::class, 'supprimerCritique']);
    Route::patch('/admin/gestion-critiques/{id}/statut', [AdminController::class, 'changerStatut']);
});

Route::middleware('isCritique')->group(function () {
    Route::get('/critique/dashboard/{id}', [AuthController::class, 'dashboardCritique']);
});