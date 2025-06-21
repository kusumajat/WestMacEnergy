<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TableController;
use App\Http\Controllers\PointsController;
use App\Http\Controllers\PolygonsController;
use App\Http\Controllers\PolylinesController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\PostMiningController;

Route::get('/map', [PointsController::class, 'index']) ->name('map');

Route::get('/table', [TableController::class, 'index']) ->name('table');

Route::resource('points', PointsController::class);

Route::resource('polylines', PolylinesController::class);

Route::resource('polygons', PolygonsController::class);

Route::get('/', [PublicController::class, 'index']) ->name('home');

Route::get('/post-mining', [PostMiningController::class, 'index']) ->name('post-mining');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/viewer', function () {
    return view('viewer');
});

