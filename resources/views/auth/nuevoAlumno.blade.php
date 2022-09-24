@extends('layouts.app')
@extends('layouts.partials.tituloSeccion')
@section('title','Registrar alumno')
<link rel="stylesheet" href="{{asset('../resources/css/barraSup_styles10.css')}}">
<link rel="stylesheet" href="{{asset('../resources/css/agregar_formulario_styles10.css')}}">
<link rel="stylesheet" href="{{asset('../resources/css/menuLateral_styles5.css')}}">
<link rel="stylesheet" href="{{asset('../resources/css/titulo_seccion_styles.css')}}">
<link rel="icon" href="{{asset('../resources/img/logo_tecnm.png')}}" type="image/png">
@section('header')
    @extends('layouts.partials.barraSup')
    @section('tituloSeccion','Agregar nuevo alumnno')
    @section('iconoSeccion')
        <img class="icono_titulo_seccion" src="{{asset('../resources/img/iconos/estudiante_icon.svg')}}" alt="">
    @endsection
    @extends('layouts.partials.menuLat')
@endsection
@section('main')
        <form class="form_create_alumno" action="{{route('alumnoregistro.store')}}" method="POST">
            @csrf
            {{-- @method('') poner el método que iba en lugar de post--}}
            <div class="tira_provisional_inputs">
                <div class="cont_lbl_input">
                    <label class="lbl_create" for="">Número de control:</label>
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
                    <label class="lbl_create" for="">Correo:</label>
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
                    <label class="lbl_create" for="">Confirmar contraseña:</label>
                    <input class="input_create" type="password" name="password_confirmation">
                    @error('password_confirmation')
                        <small class="leyenda_error_form">*{{$message}}</small>

                    @enderror
                </div>
                <div class="cont_lbl_input">
                    <label class="lbl_create" for="">Fecha de ingreso a la institución:</label>
                    <input class="input_create" type="date" name="fecha_ingreso_escuela" value="{{old('fecha_ingreso_escuela')}}">
                    @error('fecha_ingreso_escuela')
                        <small class="leyenda_error_form">*{{$message}}</small>
                    @enderror
                </div>
                <div class="cont_lbl_input">
                    <label class="lbl_create" for="">Carrera:</label>
                    <select class="input_create" name="carrera" value="{{old('carrera')}}"">
                        <option value="">Seleccionar carrera...</option>
                        <option value="Ing_tics">Ingeniería en TIC's</option>
                        <option value="Ing_agro">Ingeniería en agronomía</option>
                        <option value="Ing_ind_alim">Ingeniería en industrias de alimentos</option>
                        <option value="Ing_gest_emp">Ingeniería en gestión empresarial</option>
                    </select>
                    @error('carrera')
                        <small class="leyenda_error_form">*{{$message}}</small>

                    @enderror
                </div>
            </div>
            
            <div class="cont_btns_formulario">
                <input class="btn_aceptar estilos_compartidos_btn" type="submit" value="Agregar">
                <a href="{{route('alumnos.show')}}"><button type="button" class="btn_cancelar estilos_compartidos_btn" value="Cancelar">Cancelar y volver al listado</button></a>
            </div>
        </form>
  
@endsection