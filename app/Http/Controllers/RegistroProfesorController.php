<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Models\Profesore;
use App\Models\User;
class RegistroProfesorController extends Controller
{
    public function show(){
        return view('auth.nuevoProfesor');
    }
    public function store(Request $request){
    $profesor=new Profesore();
    $usuario=new User();
    $request->validate([
        'id'=>'required|unique:users',
        'nombre'=>'required|max:40',
        'email'=>'required|email|max:150|unique:users',
        'prim_apellido'=>'required|max:60',
        'seg_apellido'=>'required|max:60',
        'fecha_ingreso_sep'=>'required',
        'fecha_nacimiento'=>'required',
        'fecha_ingreso_institucion'=>'required',
        'area_adscripcion'=>'required',
        'grado_escolar'=>'required',
        'rfc'=>'required|max:100',
        'password'=>'required|confirmed|max:100|min:8',
        'password_confirmation'=>'required|max:100|min:8'
    ]);
    $usuario->id=$request->id;
    $usuario->email=$request->email;
    $usuario->password=bcrypt($request->password);
    $usuario->tipoUsuario=1;
    $profesor->numeroTarjeta=$request->id;
    $profesor->nombre=$request->nombre;
    $profesor->primerApellido=$request->prim_apellido;
    $profesor->segundoApellido=$request->seg_apellido;
    $profesor->fechaIngresoSep=$request->fecha_ingreso_sep;
    $profesor->fechaNacimiento=$request->fecha_nacimiento;
    $profesor->areaAdscripcion=$request->area_adscripcion;
    $profesor->gradoEscolar=$request->grado_escolar;
    $profesor->rfc=$request->rfc;
    $profesor->fechaIngresoInstitucion=$request->fecha_ingreso_institucion;
    $usuario->save();
    $profesor->save();
    return redirect()->route('profesores.show');
    }
}
