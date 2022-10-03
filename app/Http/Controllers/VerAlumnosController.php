<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Alumno;



class VerAlumnosController extends Controller
{
    public function index(){
        // $alumnos=Alumno::all();
        $datos=DB::table('alumnos')->select('*')->join('users','users.id','=','alumnos.id')->where('users.tipoUsuario',0)->get();
        
        return view('alumnos',compact('datos')) ;
    }
}
