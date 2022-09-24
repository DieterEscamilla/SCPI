<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;

class VerAlumnosController extends Controller
{
    public function index(){
        $alumnos=Alumno::all();
        return view('alumnos',compact('alumnos')) ;

    }
}
