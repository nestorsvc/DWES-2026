<?php

use App\Http\Controllers\PeliculasController;
use App\Http\Controllers\SalasController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource("salas", SalasController::class);
Route::resource("peliculas", PeliculasController::class);
