<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

Route::get('/', function () {
    return view('welcome');
});

// Registra las rutas del CRUD para la API de productos
Route::apiResource('productos', ProductoController::class);
// Ruta para mostrar la interfaz visual de productos
Route::get('/panel-productos', function () {
    return view('productos');
});