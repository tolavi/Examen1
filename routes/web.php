<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiculoController;

Route::get('/', function () {
    return view('welcome');
});

// Rutas para el módulo Vehículos
Route::resource('vehiculos', VehiculoController::class);