<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Models\Alumno;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RegistroAlumnoController extends Controller
{
    public function show(){
        return view('auth.nuevoAlumno');
    }
    public function store(Request $request){
        $alumno=new Alumno();
        $usuario=new User(); 
        $request->validate([
            'id'=>'required|unique:users|max:100',
            'nombre'=>'required|max:40',
            'prim_apellido'=>'required|max:60',
            'seg_apellido'=>'required|max:60',
            'email'=>'required|unique:users|email|max:150',
            'fecha_ingreso_escuela'=>'required',
            'carrera'=>'required',
            'password'=>'required|confirmed|max:100|min:8',
            'password_confirmation'=>'required|max:100|min:8'
        ]);
        $usuario->id=$request->id;
        $usuario->email=$request->email;
        $usuario->password=bcrypt($request->password);
        $usuario->tipoUsuario=0;
        $alumno->id=$request->id;
        $alumno->nombre=$request->nombre;
        $alumno->primerApellido=$request->prim_apellido;
        $alumno->segundoApellido=$request->seg_apellido;
        $alumno->fechaIngresoEscuela=$request->fecha_ingreso_escuela;
        $alumno->carrera=$request->carrera;
        $alumno->fechaNacimiento=$request->fecha_nacimiento;
        if($request->permisos=='avanzado'){
            $usuario->find($request->id);
            $usuario->assignRole('avanzado');
        }else if($request->permisos=='basico'){
            $usuario->find($request->id);
            $usuario->assignRole('basico');
        }
        $usuario->save();
        $alumno->save();
        return redirect()->route('alumnos.show');
    }
    public function update(Request $request,Alumno $alumno){
        $alumno=Alumno::findOrFail($request->id);
        $usuario=User::findOrFail($request->id);
        $alumno->nombre=$request->nombre;
        $alumno->primerApellido=$request->prim_apellido;
        $alumno->segundoApellido=$request->seg_apellido;
        $alumno->carrera=$request->carrera;
        $alumno->fechaNacimiento=$request->fecha_nacimiento;
        $alumno->fechaIngresoEscuela=$request->fecha_ingreso_escuela;
        $usuario->email=$request->email;
        $usuario->id=$request->id;
        $alumno->save();
        $usuario->save();
        return redirect()->route('alumnos.show');
    }
}
