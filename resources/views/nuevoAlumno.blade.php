@extends('layouts.app')
@extends('layouts.partials.tituloSeccion')
@section('title','Registrar alumno')
<link rel="stylesheet" href="{{asset('../resources/css/barraSup_styles10.css')}}">
<link rel="stylesheet" href="{{asset('../resources/css/agregar_formulario_styles8.css')}}">
<link rel="stylesheet" href="{{asset('../resources/css/menuLateral_styles5.css')}}">
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
        <form class="form_create_alumno" action="" method="">
            @csrf
            <div class="tira_provisional_inputs">
                <div class="cont_lbl_input">
                    <label class="lbl_create" for="">Número de control:</label>
                    <input class="input_create" type="text">
                </div>
                <div class="cont_lbl_input">
                    <label class="lbl_create" for="">Nombre:</label>
                    <input class="input_create" type="text">
                </div>
                <div class="cont_lbl_input">
                    <label class="lbl_create" for="">Primer apellido:</label>
                    <input class="input_create" type="text">
                </div>
                <div class="cont_lbl_input">
                    <label class="lbl_create" for="">Segundo apellido:</label>
                    <input class="input_create" type="text">
                </div>
                <div class="cont_lbl_input">
                    <label class="lbl_create" for="">Fecha de ingreso a la institución:</label>
                    <input class="input_create" type="date">
                </div>
                <div class="cont_lbl_input">
                    <label class="lbl_create" for="">Segundo apellido:</label>
                    <select class="input_create" name="" id="">
                        <option value="">Seleccionar carrera...</option>
                        <option value="Ingeniería en TIC's">Ingeniería en TIC's</option>
                        <option value="Ingeniería en agronomía">Ingeniería en agronomía</option>
                        <option value="Ingeniería en industrias de alimentos">Ingeniería en industrias de alimentos</option>
                        <option value="Ingeniería en gestión empresarial">Ingeniería en gestión empresarial</option>
                    </select>
                </div>
            </div>
            <div class="cont_btns_formulario">
                <input class="btn_aceptar estilos_compartidos_btn" type="submit" value="Agregar">
                <button class="btn_cancelar estilos_compartidos_btn" value="Cancelar">Cancelar</button>
            </div>
        </form>
  
@endsection