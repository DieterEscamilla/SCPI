<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Models\Alumno;
use App\Models\User;
class RegistroAlumnoController extends Controller
{
    public function show(){
        return view('auth.nuevoAlumno');
    }
    public function store(Request $request){
        $alumno=new Alumno();
        $usuario=new User(); 
        // $request->validate([
        //     'nro_control'=>['required'],
        //     'name'=>['required','string','max:40'],
        //     // 'email'=>['required','string','email','max:200','unique:users'],
        //     'correo'=>['required','string','email','max:200'],
        //     'prim_apellido'=>['required','string','max:60'],
        //     'seg_apellido'=>['required','string','max:60'],
        //     // 'fecha_ingreso_escuela'=>['required','date'],
        //     // 'fecha_nacimiento'=>['required','date'],
        //     // 'carrera'=>['required','string'],
        //     'password'=>['required']
        //     // Rules\Password::defaults()
        //     // 'password_confirmation'=>['required']
        // ]);
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
        $alumno->nombre=$request->nombre;
        $alumno->primerApellido=$request->prim_apellido;
        $alumno->segundoApellido=$request->seg_apellido;
        $alumno->fechaIngresoEscuela=$request->fecha_ingreso_escuela;
        $alumno->carrera=$request->carrera;
        $usuario->id=$request->id;
        $usuario->email=$request->email;
        $usuario->password=bcrypt($request->password);
        $usuario->tipoUsuario=0;
        $alumno->save();
        $usuario->save();
        // Alumno::create([
        //     'nombre'=>$request->input('nombre'),
        //     'primerApellido'=>$request->input('prim_apellido'),
        //     'segundoApellido'=>$request->input('seg_apellido'),
        //     'fechaIngresoEscuela'=>$request->input('fecha_ingreso_escuela'),
        //     'carrera'=>$request->input('carrera')
        // ]);
        // User::create([
        //     'idUsuario'=>$request->input('nro_control'),
        //     'correo'=>$request->input('correo'),
        //     'password'=>$request->input('password'),
        //     'tipoUsuario'=>0
        // ]);
        return redirect()->route('inicio');
    }
}
