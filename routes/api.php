<?php

use App\Http\Controllers\MediaController;
use App\Http\Controllers\UserMediaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('media', MediaController::class)->parameters([
    'media' => 'media',
]);

Route::get('/users/{user}/media', [UserMediaController::class, 'index']);
Route::post('/users/{user}/media', [UserMediaController::class, 'store']);
Route::delete('/users/{user}/media/{media}', [UserMediaController::class, 'destroy']);