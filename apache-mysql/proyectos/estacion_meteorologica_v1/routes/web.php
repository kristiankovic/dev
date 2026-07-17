<?php

use App\Models\Registro;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $registros = Registro::all();
    return view('index', compact('registros'));
});
