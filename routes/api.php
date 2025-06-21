<?php

use App\Http\Controllers\APIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/points', [APIController::class, 'points'])->name('api.points');
Route::get('/point/{id}', [APIController::class, 'point'])->name('api.point');

Route::get('/polylines', [APIController::class, 'polylines'])->name('api.polylines');
Route::get('/polyline/{id}', [APIController::class, 'polyline'])->name('api.polyline');

Route::get('/polygons', [APIController::class, 'polygons'])->name('api.polygons');
Route::get('/polygon/{id}', [APIController::class, 'polygon'])->name('api.polygon');

Route::get('/titiks', [APIController::class, 'titiks'])->name('api.titiks');
Route::get('/titik/{id}', [APIController::class, 'titik'])->name('api.titik');

Route::get('/gariss', [APIController::class, 'gariss'])->name('api.gariss');
Route::get('/garis/{id}', [APIController::class, 'garis'])->name('api.garis');

Route::get('/areas', [APIController::class, 'areas'])->name('api.areas');
Route::get('/area/{id}', [APIController::class, 'area'])->name('api.area');
