<?php

use App\Http\Controllers\PersonaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', fn (Request $request) => $request->user());

    Route::get('personas/find', [PersonaController::class, 'find']);
    Route::apiResource('personas', PersonaController::class);
});
