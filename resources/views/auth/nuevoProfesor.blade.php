@extends('layouts.app')
@extends('layouts.partials.tituloSeccion')
@section('title','Registrar profesor'){{--Viene de layouts.app--}}
<link rel="stylesheet" href="{{asset('../resources/css/barraSup_styles10.css')}}">
<link rel="stylesheet" href="{{asset('../resources/css/agregar_formulario_styles10.css')}}">
<link rel="stylesheet" href="{{asset('../resources/css/menuLateral_styles5.css')}}">
<link rel="stylesheet" href="{{asset('../resources/css/titulo_seccion_styles.css')}}">
<link rel="icon" href="{{asset('../resources/img/logo_tecnm.png')}}" type="image/png">
@section('header')
    @extends('layouts.partials.barraSup')
    @section('tituloSeccion','Agregar nuevo profesor')  {{--Viene de layouts.partials.tituloSeccion --}}
    @section('iconoSeccion')
        <img class="icono_profesor" src="{{asset('../resources/img/iconos/profesor_icon.svg')}}" alt="">
    @endsection
@endsection
@section('main')
@extends('layouts.partials.menuLat')
<form class="form_create_alumno" action="{{route('profregistro.store')}}" method="POST">
    @csrf
    {{-- @method('') poner el método que iba en lugar de post--}}
    <div class="tira_provisional_inputs">
        <div class="cont_lbl_input">
            <label class="lbl_create" for="">Número de tarjeta:</label>
            <input class="input_create" type="text" name="id" value="{{old('id')}}">
            @error('id')
                <small class="leyenda_error_form">*{{$message}}</small>
            @enderror
        </div>
        <div class="cont_lbl_input">
            <label class="lbl_create" for="">Nombre:</label>
            <input class="input_create" type="text" name="nombre" value="{{old('nombre')}}">
            @error('nombre')
                <small class="leyenda_error_form">*{{$message}}</small>
            @enderror
        </div>
        <div class="cont_lbl_input">
            <label class="lbl_create" for="">Primer apellido:</label>
            <input class="input_create" type="text" name="prim_apellido" value="{{old('prim_apellido')}}">
            @error('prim_apellido')
                <small class="leyenda_error_form">*{{$message}}</small>
            @enderror
        </div>
        <div class="cont_lbl_input">
            <label class="lbl_create" for="">Segundo apellido:</label>
            <input class="input_create" type="text" name="seg_apellido" value="{{old('seg_apellido')}}">
            @error('seg_apellido')
                <small class="leyenda_error_form">*{{$message}}</small>
            @enderror
        </div>
        <div class="cont_lbl_input">
            <label class="lbl_create" for="">Email:</label>
            <input class="input_create" type="email" name="email" value="{{old('email')}}">
            @error('email')
                <small class="leyenda_error_form">*{{$message}}</small>
            @enderror
        </div>
        <div class="cont_lbl_input">
            <label class="lbl_create" for="">Contraseña:</label>
            <input class="input_create" type="password" name="password">
            @error('password')
                <small class="leyenda_error_form">*{{$message}}</small>
            @enderror
        </div>
        <div class="cont_lbl_input">
            <label class="lbl_create" for="">Repetir contraseña:</label>
            <input class="input_create" type="password" name="password_confirmation">
            @error('password_confirmation')
                <small class="leyenda_error_form">*{{$message}}</small>
            @enderror
        </div>
        <div class="cont_lbl_input">
            <label class="lbl_create" for="">Fecha de nacimiento:</label>
            <input class="input_create" type="date" name="fecha_nacimiento" value="{{old('fecha_nacimiento')}}">
            @error('fecha_nacimiento')
                <small class="leyenda_error_form">*{{$message}}</small>
            @enderror
        </div>
        <div class="cont_lbl_input">
            <label class="lbl_create" for="">Fecha de ingreso a la instutución:</label>
            <input class="input_create" type="date" name="fecha_ingreso_institucion" value="{{old('fecha_ingreso_institucion')}}">
            @error('fecha_ingreso_institucion')
                <small class="leyenda_error_form">*{{$message}}</small>
            @enderror
        </div>
        <div class="cont_lbl_input">
            <label class="lbl_create" for="">Fecha de ingreso a la SEP:</label>
            <input class="input_create" type="date" name="fecha_ingreso_sep" value="{{old('fecha_ingreso_sep')}}">
            @error('fecha_ingreso_sep')
                <small class="leyenda_error_form">*{{$message}}</small>
            @enderror
        </div>
        <div class="cont_lbl_input">
            <label class="lbl_create" for="">RFC:</label>
            <input class="input_create" type="text" name="rfc" value="{{old('rfc')}}">
            @error('rfc')
                <small class="leyenda_error_form">*{{$message}}</small>
            @enderror
        </div>
        <div class="cont_lbl_input">
            <label class="lbl_create" for="">Grado escolar:</label>
            <select class="input_create" id="" name="grado_escolar" value="{{old('grado_escolar')}}">
                <option value="">Seleccionar grado...</option>
                <option value="Licenciatura/ingeniería">Licenciatura/ingeniería</option>
                <option value="Maestría">Maestría</option>
                <option value="Doctorado">Doctorado</option>
            </select>
            @error('grado_escolar')
                <small class="leyenda_error_form">*{{$message}}</small>
            @enderror
        </div>
        <div class="cont_lbl_input">
            <label class="lbl_create" for="">Area adscripcion:</label>
            {{-- En caso de que este campo deba ir en el form, preguntar todas las áreas de adscipción existentes --}}
            <select class="input_create" id="" name="area_adscripcion" value="{{old('area_adscripcion')}}">
                <option value="">Seleccionar área...</option>
                <option value="Departamento de ciencias basicas">Departamento de ciencias báscias</option>
                <option value="Departamento de gestión de recursos financieros">Departamento de gestión de recursos financieros</option>
                <option value="etc">Etc...</option>
            </select>
            @error('area_adscripcion')
                <small class="leyenda_error_form">*{{$message}}</small>
            @enderror
        </div>
    </div>
    <div class="cont_btns_formulario">
        <input class="btn_aceptar estilos_compartidos_btn" type="submit" value="Agregar">
        <a href="{{route('profesores.show')}}"><button type="button" class="btn_cancelar estilos_compartidos_btn" value="Cancelar">Cancelar y volver al listado</button></a>
    </div>
</form>
@endsection