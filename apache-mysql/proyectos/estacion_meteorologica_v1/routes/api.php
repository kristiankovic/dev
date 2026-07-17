<?php

use App\Http\Controllers\Api\RegistroController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/registros', [RegistroController::class, 'index']);
Route::post('/registros', [RegistroController::class, 'store']);