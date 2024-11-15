<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('auth.login');
});
// Ruta para el CRUD de libros
Route::resource('libros', LibroController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
