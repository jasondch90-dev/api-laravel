<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

// Ruta por defecto de Laravel para autenticación con tokens
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Rutas de nuestra API de Productos
// El método apiResource genera automáticamente las 5 rutas
// necesarias para el CRUD (index, store, show, update, destroy)
// Laravel añadirá automáticamente el prefijo "/api" a estas rutas.
Route::apiResource('productos', ProductoController::class);