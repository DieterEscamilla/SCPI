@extends('layouts.app')
@extends('layouts.partials.tituloSeccion')
@section('title','Registrar profesor'){{--Viene de layouts.app--}}
<link rel="stylesheet" href="{{asset('../resources/css/barraSup_styles10.css')}}">
<link rel="stylesheet" href="{{asset('../resources/css/agregar_formulario_styles8.css')}}">
<link rel="stylesheet" href="{{asset('../resources/css/menuLateral_styles5.css')}}">
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
<form class="form_create_alumno" action="" method="">
    @csrf
    <div class="tira_provisional_inputs">
        <div class="cont_lbl_input">
            <label class="lbl_create" for="">Número de tarjeta:</label>
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
            <label class="lbl_create" for="">Fecha de nacimiento:</label>
            <input class="input_create" type="date">
        </div>
        <div class="cont_lbl_input">
            <label class="lbl_create" for="">Fecha de ingreso a la SEP:</label>
            <input class="input_create" type="date">
        </div>
        <div class="cont_lbl_input">
            <label class="lbl_create" for="">Grado escolar:</label>
            <select class="input_create" name="" id="">
                <option value="">Seleccionar grado...</option>
                <option value="Licenciatura/ingeniería">Licenciatura/ingeniería</option>
                <option value="Maestría">Maestría</option>
                <option value="Doctorado">Doctorado</option>
            </select>
        </div>
    </div>
    <div class="cont_btns_formulario">
        <input class="btn_aceptar estilos_compartidos_btn" type="submit" value="Agregar">
        <button class="btn_cancelar estilos_compartidos_btn" value="Cancelar">Cancelar</button>
    </div>
</form>


@endsection