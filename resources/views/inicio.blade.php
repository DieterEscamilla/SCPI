@extends('layouts.app')
@section('title','Inicio')
<link rel="stylesheet" href="{{asset('../resources/css/barraSup_styles10.css')}}">
<link rel="stylesheet" href="{{asset('../resources/css/menuLateral_styles5.css')}}">
<link rel="stylesheet" href="{{asset('../resources/css/normalizador.css')}}">
<link rel="icon" href="{{asset('../resources/img/logo_tecnm.png')}}" type="image/png">
@section('header')
    @extends('layouts.partials.barraSup')
    @extends('layouts.partials.menuLat')
@endsection
@section('main')
    <p>Ésta es la página de inicio</p>
    <a href="{{route('create.alumno')}}">Agregar un nuevo alumno</a>
    <a href="{{route('create.profesor')}}">Agregar un nuevo profesor</a>
@endsection