<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // public function registrar(Request $request){
    //     $usuario=new User();
    //     $usuario->nombre=$request->name;
    //     $usuario->email=$request->email;
    //     $usuario->password=Hash::make($request->password);
    //     $usuario->save();
    //     Auth::login($user);
    //     return redirect(route('inicio'));
    //     }
    public function show(){
        return view('auth.login');
    }
    public function store(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        // $credenciales=[
        //     'email'=>$request->email,
        //     'password'=>$request->password
        // ];
        $credenciales=request()->only('email','password');
        $remember=($request->has('remember') ? true : false);
        if(Auth::attempt($credenciales)){
            $request->session()->regenerate();
            return redirect()->route('inicio');
        }else{
            return back()->withErrors([
                'message'=>'Usuario o contraseña incorrectos'
            ]);
        }
    }
    public function destroy(Request $request){
        Auth::logout(); 
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('login'));
    }
}
