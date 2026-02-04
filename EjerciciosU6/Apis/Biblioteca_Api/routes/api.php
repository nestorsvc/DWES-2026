<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::apiResource('authors', AuthorController::class);
// Route::apiResource('books', BookController::class);
// Route::apiResource('categories', CategoryController::class);

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    // Obtener datos del usuario autenticado
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    // Cerrar sesión
    Route::post('/logout', [AuthController::class, 'logout']);
    // Recursos de la API (Autores, Libros, etc.)
    Route::apiResource('authors', AuthorController::class);
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('books', BookController::class);

});
