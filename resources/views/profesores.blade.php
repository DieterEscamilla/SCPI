@extends('layouts.app')
@extends('layouts.partials.tituloSeccion')
@section('title','Profesores')
<link rel="stylesheet" href="{{asset('../resources/css/barraSup_styles10.css')}}">
<link rel="stylesheet" href="{{asset('../resources/css/menuLateral_styles5.css')}}">
<link rel="stylesheet" href="{{asset('../resources/css/tabla_styles3.css')}}">
<link rel="stylesheet" href="{{asset('../resources/css/titulo_seccion_styles.css')}}">
<link rel="stylesheet" href="{{asset('../resources/css/normalizador.css')}}">
<link rel="icon" href="{{asset('../resources/img/logo_tecnm.png')}}" type="image/png">
@section('header')
    @extends('layouts.partials.barraSup')
    @section('tituloSeccion','Profesores registrados')
    @section('iconoSeccion')
        <img class="icono_profesor" src="{{asset('../resources/img/iconos/profesor_icon.svg')}}" alt="">
    @endsection
@endsection
@section('main')
    @extends('layouts.partials.menuLat')
    <div class="cont_tabla">
        <table class="tabla">
            <thead class="cabecera_tabla">
                <tr>
                    <td class="tdh campo_cabecera_tabla_izquierdo">Nombre</td>
                    <td class="tdh">Fecha de ingreso a la institución</td>
                    <td class="tdh">Fechad de ingreso a la SEP</td>
                    <td class="tdh">Grado escolar</td>
                    <td class="tdh">Área</td>
                    <td class="tdh">Edad</td>
                    <td class="tdh">RFC</td>
                    <td class="tdh campo_cabecera_tabla_derecho">Correo</td>
                </tr>
            </thead>
            <tbody class="cuerpo_tabla">
                @foreach($profesores as $profesor)
                    <tr>
                        <td class="tdb">{{$profesor->nombre}} {{$profesor->primerApellido}} {{$profesor->segundoApellido}}</td>
                        <td class="tdb">{{$profesor->fechaIngresoInstitucion}}</td>
                        <td class="tdb">{{$profesor->fechaIngresoSep}}</td>
                        <td class="tdb">{{$profesor->gradoEscolar}}</td>
                        <td class="tdb ">{{$profesor->areaAdscripcion}}</td>
                        <td class="tdb">X</td>
                        <td class="tdb">{{$profesor->rfc}}</td>
                        <td class="tdb">X</td>
                    </tr>
                    @endforeach
                    <tr class="fila_boton_agregar">
                        <td colspan="8" class="tdb"><a href="{{route('profregistro.show')}}"><button class="btn_agregar_tabla" type="button">Agregar nuevo profesor</button></a></td>
                    </tr>
                
                {{-- <tr>
                    <td class="tdb">Luis Miguel Escobar Jimenez</td>
                    <td class="tdb">10-10-2000</td>
                    <td class="tdb">19-12-1998</td>
                    <td class="tdb">Doctorado</td>
                    <td class="tdb">Departamoento de ciencias básicas</td>
                    <td class="tdb">62</td>
                    <td class="tdb">OOSL977SHA</td>
                    <td class="tdb">luismiguelescjim@gmail.com.mx</td>
                </tr>
                <tr>
                    <td class="tdb">Edmundo Cruz Hernández</td>
                    <td class="tdb">12-08-2004</td>
                    <td class="tdb">12-07-2003</td>
                    <td class="tdb">Ingeniería/Licenciatura</td>
                    <td class="tdb">Departamento de administración de recursos financieros</td>
                    <td class="tdb">43</td>
                    <td class="tdb">LLSOI1678S</td>
                    <td class="tdb">edmundocruz.h@gmail.com.mx</td>
                </tr>
                <tr>
                    <td class="tdb">José Escobedo Parada</td>
                    <td class="tdb">12-01-1999</td>
                    <td class="tdb">01-01-1998</td>
                    <td class="tdb">Maestría</td>
                    <td class="tdb">Únicamente profesor</td>
                    <td class="tdb">47</td>
                    <td class="tdb">LLSOA9876S</td>
                    <td class="tdb">joseescobedoparada@itat.edu.mx</td>
                </tr>
                <tr>
                    <td class="tdb">x</td>
                    <td class="tdb">x</td>
                    <td class="tdb">x</td>
                    <td class="tdb">x</td>
                    <td class="tdb">x</td>
                    <td class="tdb">x</td>
                    <td class="tdb">x</td>
                    <td class="tdb">x</td>
                </tr> --}}
            </tbody>
        </table>
    </div>

@endsection