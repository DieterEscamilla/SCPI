<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});
Route::get('inicio',function(){
    return view('inicio');
})->name('inicio');
Route::get('login',function(){
    return view('auth.login');
});
Route::get('nuevo-alumno',function(){
    return view('nuevoAlumno');
})->name('create.alumno');
Route::get('nuevo-profesor',function(){
    return view('nuevoProfesor');
})->name('create.profesor');
