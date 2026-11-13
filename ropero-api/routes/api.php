<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\VoluntarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', fn (Request $request) => $request->user());

    Route::get('personas/find', [PersonaController::class, 'find']);
    Route::apiResource('personas', PersonaController::class);

    Route::get('voluntarios/find', [VoluntarioController::class, 'find']);
    Route::apiResource('voluntarios', VoluntarioController::class)->except(['destroy']);

    Route::apiResource('categorias', CategoriaController::class)->except(['destroy']);
});
