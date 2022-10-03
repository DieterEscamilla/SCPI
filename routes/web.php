<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistroProfesorController;
use App\Http\Controllers\RegistroAlumnoController;
use App\Http\Controllers\VerProfesorController;
use App\Http\Controllers\VerAlumnosController;
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
// ->middleware('auth')->middleware('guest');
// Route::get('login',function(){
//     return view('auth.login');
// });
// Route::get('nuevo-alumno',function(){
//     return view('nuevoAlumno');
// })->name('create.alumno');
// Route::get('nuevo-profesor',function(){
//     return view('nuevoProfesor');
// })->name('create.profesor');
Route::get('nuevo-profesor',[RegistroProfesorController::class,'show'])->name('profregistro.show');
Route::post('nuevo-profesor',[RegistroProfesorController::class,'store'])->name('profregistro.store');
Route::get('nuevo-alumno',[RegistroAlumnoController::class,'show'])->name('alumnoregistro.show');
Route::post('nuevo-alumno',[RegistroAlumnoController::class,'store'])->name('alumnoregistro.store');
Route::put('editar-alumno',[RegistroAlumnoController::class,'update'])->name('alumnos.update');
Route::get('mostrar-profesores',[VerProfesorController::class,'index'])->name('profesores.show');
Route::get('mostrar-alumnos',[VerAlumnosController::class,'index'])->name('alumnos.show');
Route::get('login',[LoginController::class,'show'])->name('login');
Route::post('login',[LoginController::class,'store'])->name('login.store');
