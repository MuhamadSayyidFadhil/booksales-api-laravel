<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');

// Route::apiResource('/books', BookController::class);


//GENRES
// Route::apiResource('genres', GenreController::class);
Route::apiResource('genres', GenreController::class)->only(['index', 'show']);
//admin
Route::middleware(['auth:api', 'role:admin'])->group(function () {
    Route::apiResource('genres', GenreController::class)->only(['store', 'update', 'destroy']);
});


//AUTHORS
// Route::apiResource('authors', AuthorController::class);
Route::apiResource('authors', AuthorController::class)->only(['index', 'show']);
//admin
Route::middleware(['auth:api', 'role:admin'])->group(function () {
    Route::apiResource('authors', AuthorController::class)->only(['store', 'update', 'destroy']);
});


Route::apiResource('books', BookController::class)->only(['index', 'show']);

Route::middleware(['auth:api', 'role:admin'])->group(function () {
    Route::apiResource('books', BookController::class)->only(['store', 'update', 'destroy']);
});


