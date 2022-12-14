@extends('layouts.app')
@section('title','Iniciar sesión')
<link rel="stylesheet" href="{{asset('../resources/css/login_styles7.css')}}">
@section('main')
    <header class="header">
        <h1 class="h1"><b class="subrayado_form_login">S</b>istema de <b class="subrayado_form_login">C</b>ontrol de <b class="subrayado_form_login">P</b>royectos del <b class="subrayado_form_login">ITAT</b></h1>
        <h2><b class="subrayado_form_login">(SCPI)</b></h2>
    </header>
    <main class="main">
    <div class="contenedor_formulario">
        <div class="cont_img_logo_tecnm">
            <img class="img_logo_tecnm" src="{{asset('../resources/img/logo_tecnm.png')}}" alt="Logotipo del Tecnológico Nacional de México">
        </div>
        <form class="formulario" action="{{route('login.store')}}" method="POST">
            @csrf
            {{-- @method() poner el otro método en lugar de POST--}}
            {{-- <div class="contenedor_todos_inputs"> --}}
                <div class="grupo_lbl_input">
                    <label class="lbl_input" for="">Correo:</label>
                    <div class="contenedor_icono_input">
                        <div class="div_icono_input"><img class="img_icono_input" src="{{asset('../resources/img/iconos/user_icon.svg')}}" alt=""></div>
                        <input class="input" type="email" name="email" id="" required>
                    </div>
                </div>
                <div class="grupo_lbl_input ">
                    <label class="lbl_input" for="">Contraseña:</label>
                    <div class="contenedor_icono_input">
                        <div class="div_icono_input"><img class="img_icono_input" src="{{asset('../resources/img/iconos/password_icon.svg')}}" alt=""></div>
                        <input class="input" type="password" name="password" required>
                    </div>
                </div>
            {{-- </div> --}}
            <div class="contenedor_button_submit">
                <input class="btn_iniciar_sesion" type="submit" value="Iniciar Sesión">
            </div>
            <div class="contenedor_recuperar_contrasena">
                <label class="leyenda_no_recuperar_contrasena" for="">¿Olvidaste tu contraseña?</label>
                <a class="enlace_recuperar_contrasena" href="#">Recupérala aquí</a>
            </div>
            @error('email')            
                    <small class="mensaje_error_form" id="cont_mensaje_error_login_email">
                        *{{$message}}
                        <img class="cerrar_label_error_login email_mistake" src="{{asset('../resources/img/iconos/cerrar_icon.svg')}}" alt="">
                    </small>
            @enderror
            @error('password')
            <small class="mensaje_error_form" id="cont_mensaje_error_login_password">
                *{{$message}}
                <img class="cerrar_label_error_login password_mistake" src="{{asset('../resources/img/iconos/cerrar_icon.svg')}}" alt="">
            </small>
            @enderror
            @error('message')
            <small class="mensaje_error_form" id="cont_mensaje_error_login_both">
                {{$message}}
                <img class="cerrar_label_error_login both_mistake" src="{{asset('../resources/img/iconos/cerrar_icon.svg')}}" alt="">
            </small>
            @enderror
            
            {{-- <div class="contenedor_opcion_registro">
                <p class="leyenda_no_recuperar_contraseña">¿Olvidaste tu contraseña?</p>
                <a class="enlace_registro" href="#">Regístrate aquí</a>
            </div> --}}
        </form>
        

    </div>
    </main>

@endsection
@section('scripts')
    <script src="{{asset('../resources/js/login_scripts.js')}}"></script>
@endsection