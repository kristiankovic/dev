<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/login', function(){
//     return view('login');
// });

Route::post('/login', [LoginController::class, 'login'])->name('login.form');
Route::post('/register', [LoginController::class, 'register'])->name('register.form');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout.form');

Route::view('/private', 'private')->middleware('auth')->name('private');
Route::view('/login' , 'login')->name('login.view');
Route::view('/iniciar-sesion', 'login')->name('login');
Route::view('/register', 'register')->name('register.view');