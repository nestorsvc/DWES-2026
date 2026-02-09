<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'active',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // ========================================
    // RUTAS SOLO PARA BIBLIOTECARIOS Y ADMINS
    // ========================================
    Route::middleware(['role:librarian,admin'])->group(function () {
        // Gestión de préstamos
        Route::get('/loans', [LoanController::class, 'indexAll'])->name('loans.indexAll');
        Route::patch('/loans/{id}/approve', [LoanController::class, 'approve'])->name('loans.approve');
        Route::patch('/loans/{id}/reject', [LoanController::class, 'reject'])->name('loans.reject');
        Route::patch('/loans/{id}/returned', [LoanController::class, 'markAsReturned'])->name('loans.markAsReturned');

        // CRUD de libros (crear, editar, eliminar)
        Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
        Route::post('/books', [BookController::class, 'store'])->name('books.store');
        Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('books.edit');
        Route::put('/books/{id}', [BookController::class, 'update'])->name('books.update');
        Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');

        // CRUD de autores
        Route::get('/authors/create', [AuthorController::class, 'create'])->name('authors.create');
        Route::post('/authors', [AuthorController::class, 'store'])->name('authors.store');
        Route::get('/authors/{id}/edit', [AuthorController::class, 'edit'])->name('authors.edit');
        Route::put('/authors/{id}', [AuthorController::class, 'update'])->name('authors.update');
        Route::delete('/authors/{id}', [AuthorController::class, 'destroy'])->name('authors.destroy');

        // CRUD de categorías
        Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

        // Gestión de usuarios
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
        Route::patch('/users/{id}/toggle-active', [UserController::class, 'toggleActive'])->name('users.toggleActive');
    });

    // ========================================
    // RUTAS SOLO PARA ADMIN
    // ========================================
    Route::middleware(['role:admin'])->group(function () {
        Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    });

    // ========================================
    // RUTAS PARA TODOS LOS USUARIOS (lectura)
    // ========================================
    Route::get('/books', [BookController::class, 'index'])->name('books.index');
    Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');

    Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index');
    Route::get('/authors/{id}', [AuthorController::class, 'show'])->name('authors.show');

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');

    // ========================================
    // RUTAS SOLO PARA SOCIOS
    // ========================================
    Route::middleware(['role:user'])->group(function () {
        Route::get('/my-loans', [LoanController::class, 'index'])->name('loans.index');
        Route::get('/loans/request', [LoanController::class, 'create'])->name('loans.create');
        Route::post('/loans', [LoanController::class, 'store'])->name('loans.store');
    });
});
