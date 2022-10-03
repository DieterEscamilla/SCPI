<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Profesore;
use App\Models\User;
use Carbon\Carbon;

class VerProfesorController extends Controller
{
    public function index(){
        // $profesores=Profesore::all();
        //$usuarios_correo=User::select('email')->get();
        // return view('profesores',compact('profesores'));
        $datos=DB::table('profesores')->select('*')->join('users','users.id','=','profesores.numeroTarjeta')->where('users.tipoUsuario',1)->get();
        // $fecha_nacimiento=DB::table('profesores')->select('fechaNacimiento')->get();
        // $edad=Carbon::parse($fecha_nacimiento)->age;
        //  $fecha_actual=Carbon::now();
        // $edad_profesor=Carbon::parse($fecha_nacimiento->fechaNacimiento)->age;
        // $edad_string= Carbon::createFromDate($fecha_nacimiento_parseada)->age;
        // $edad_profesord=$fecha_actual->diffForHumans($fecha_nacimiento_parseada,$fecha_actual);
        return view('profesores',compact('datos'));

    }
}
