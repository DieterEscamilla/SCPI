<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profesore;
use App\Models\User;
class VerProfesorController extends Controller
{
    public function index(){
        $profesores=Profesore::all();
        //$usuarios_correo=User::select('email')->get();
        return view('profesores',compact('profesores'));
    }
}
