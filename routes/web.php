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

Route::get('/home', [App\Http\Controllers\LibroController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [LibroController::class, 'index'])->name('home');
});