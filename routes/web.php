<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisiteController;
use App\Http\Controllers\RestaurantsController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('accueil');
})->name('accueil');


Route::get('/restaurants', [RestaurantsController::class, 'index'])->name('liste.restaurants');


Route::get('/restaurants/{restaurant}/visites', [VisiteController::class, 'index'])->name('restaurants.visites.index');
Route::get('/visites/{visite}', [VisiteController::class, 'show'])->name('visites.show');
Route::get('/visites/{visite}/edit', [VisiteController::class, 'edit'])->name('visites.edit');
Route::put('/visites/{visite}', [VisiteController::class, 'update'])->name('visites.update');
Route::delete('/visites/{visite}', [VisiteController::class, 'destroy'])->name('visites.destroy');

// Si déjà connecté → redirige vers le bon dashboard
Route::middleware('redirectIfAuth')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('inscription');
    Route::post('/register', [AuthController::class, 'register']);
});
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware('isAdmin')->group(function () {
    Route::get('/admin/dashboard/{id}', [AuthController::class, 'dashboardAdmin']);
    Route::get('/admin/gestion-critiques', [AdminController::class, 'listeCritiques']);
    Route::delete('/admin/gestion-critiques/{id}', [AdminController::class, 'supprimerCritique']);
    Route::patch('/admin/gestion-critiques/{id}/statut', [AdminController::class, 'changerStatut']);
    Route::get('/restaurants/ajout', [RestaurantsController::class, 'create'])->name('ajout.restaurants');
    Route::get('/restaurants/{id}/edit', [RestaurantsController::class, 'edit'])->name('modif.restaurants');
    Route::put('/restaurants/{id}', [RestaurantsController::class, 'update']);
    Route::delete('/restaurants/{id}', [RestaurantsController::class, 'destroy']);
    Route::post('/restaurants', [RestaurantsController::class, 'store']);
});

Route::middleware('isCritique')->group(function () {
    Route::get('/critique/dashboard/{id}', [AuthController::class, 'dashboardCritique']);
    Route::get('/restaurants/{restaurant}/visites/ajouter', [VisiteController::class, 'create'])->name('restaurants.visites.create');
Route::post('/restaurants/{restaurant}/visites', [VisiteController::class, 'store'])->name('restaurants.visites.store');
});