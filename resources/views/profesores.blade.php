@extends('layouts.app')
@extends('layouts.partials.tituloSeccion')
@section('title','Profesores')
<link rel="stylesheet" href="{{asset('../resources/css/barraSup_styles10.css')}}">
<link rel="stylesheet" href="{{asset('../resources/css/menuLateral_styles5.css')}}">
<link rel="stylesheet" href="{{asset('../resources/css/tabla_styles6.css')}}">
<link rel="stylesheet" href="{{asset('../resources/css/titulo_seccion_styles.css')}}">
<link rel="stylesheet" href="{{asset('../resources/css/normalizador.css')}}">
<link rel="stylesheet" href="{{asset('../resources/css/agregar_formulario_styles12.css')}}">
<link rel="stylesheet" href="{{asset('../resources/css/barra_scroll_styles.css')}}">
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
                    {{-- <td class="tdh">Fecha de ingreso a la institución</td>
                    <td class="tdh">Fechad de ingreso a la SEP</td>
                    <td class="tdh">Grado escolar</td> --}}
                    <td class="tdh">Número de tarjeta</td>
                    {{-- <td class="tdh">Edad</td> --}}
                    {{-- <td class="tdh">RFC</td> --}}
                    <td class="tdh">Área</td>
                    <td class="tdh">Correo</td>
                    <td class="tdh campo_cabecera_tabla_derecho">Acciones</td>
                </tr>
            </thead>
            <tbody class="cuerpo_tabla">
                @foreach($datos as $profesor)
                    <tr>
                        <td class="tdb">{{$profesor->nombre}} {{$profesor->primerApellido}} {{$profesor->segundoApellido}}</td>
                        <td class="tdb">{{$profesor->numeroTarjeta}}</td>
                        <td class="tdb elementos_ocultos_tabla">{{$profesor->gradoEscolar}}</td>
                        <td class="tdb ">{{$profesor->areaAdscripcion}}</td>
                        <td class="tdb">{{$profesor->email}}</td>
                        <td class="tdb elementos_ocultos_tabla">{{$profesor->fechaIngresoInstitucion}}</td>
                        <td class="tdb elementos_ocultos_tabla">{{$profesor->fechaIngresoSep}}</td>
                        <td class="tdb elementos_ocultos_tabla">{{\Carbon\Carbon::parse($profesor->fechaNacimiento)->age;}}</td>
                        <td class="tdb elementos_ocultos_tabla">{{$profesor->rfc}}</td>
                        
                        <td class="tdb">
                            <img class="iconos_acciones_tabla" src="{{asset('../resources/img/iconos/icono_eliminar.svg')}}" alt="">
                            <img class="iconos_acciones_tabla" src="{{asset('../resources/img/iconos/icono_actualizar.svg')}}" alt="">
                            <img class="iconos_acciones_tabla btn_ojo_ver_detalles_modal"  src="{{asset('../resources/img/iconos/ojo_icono.svg')}}" alt="">
                        </td>
                    </tr>
                    </tr>
                    @endforeach
                    <tr class="fila_boton_agregar">
                        <td colspan="10" class="tdb"><button id="btn_agregar_profesor" class="btn_agregar_tabla" type="button">Agregar nuevo profesor</button></td>
                    </tr>   
            </tbody>
        </table>
        <div class="overlay_ver_detalles" id="overlay_ver_detalles">
            <div class="modal_ver_detalles">
                <div class="cont_btn_color_cerrar_detalles"><img class="btn_cerrar_modal_tabla btn_cerrar_modal_detalles" id="btn_cerrar_modal_tabla" src="{{asset('../resources/img/iconos/cerrar_icon.svg')}}" alt=""></div>
                <h3 class="elemento_modal_tabla titulo_modal_tabla"></h3>
                {{-- <div class="cont_key_dato_modal_tabla">
                    <label class="lbl_key_modal_datos_tabla" for="">Nombre:</label>
                    <label class="" for=""></label>
                </div> --}}
                <div class="cont_key_dato_modal_tabla">
                    <label class="lbl_key_modal_datos_tabla" for="">Número de tarjeta:</label>
                    <label class="elemento_modal_tabla" for=""></label>
                </div>
                <div class="cont_key_dato_modal_tabla">
                    <label class="lbl_key_modal_datos_tabla" for="">Grado escolar:</label>
                    <label class="elemento_modal_tabla" for=""></label>
                </div>
                <div class="cont_key_dato_modal_tabla">
                    <label class="lbl_key_modal_datos_tabla" for="">Área adscripción:</label>
                    <label class="elemento_modal_tabla" for=""></label>
                </div>
                <div class="cont_key_dato_modal_tabla">
                    <label class="lbl_key_modal_datos_tabla" for="">Email:</label>
                    <label class="elemento_modal_tabla" for=""></label>
                </div>
                <div class="cont_key_dato_modal_tabla">
                    <label class="lbl_key_modal_datos_tabla" for="">Fecha ingreso institución:</label>
                    <label class="elemento_modal_tabla" for=""></label>
                </div>
                <div class="cont_key_dato_modal_tabla">
                    <label class="lbl_key_modal_datos_tabla" for="">Fecha ingreso SEP:</label>
                    <label class="elemento_modal_tabla" for=""></label>
                </div>
                <div class="cont_key_dato_modal_tabla">
                    <label class="lbl_key_modal_datos_tabla" for="">Edad:</label>
                    <label class="elemento_modal_tabla edad" for=""></label>
                </div>
                <div class="cont_key_dato_modal_tabla">
                    <label class="lbl_key_modal_datos_tabla" for="">RFC:</label>
                    <label class="elemento_modal_tabla" for=""></label>
                </div>
                <div class="cont_btn_rectangulo_cerrar_modal_detalles">
                    <button class="btn_rectangulo_cerrar_modal_detalles btn_cerrar_modal_detalles" type="button">Aceptar</button>
                </div>
            </div>
        </div>
        <div class="overlay" id="overlay">
            <div class="modal">
                <form class="form_create_alumno" action="{{route('profregistro.store')}}" method="POST">
                    @csrf
                    <div class="cont_titulo_form_agreagr btn_cerrar_modal" id="btn_cerrar_modal">
                        <h3>Agregar nuevo profesor</h3>
                        <img class="icono_cerrar_form" src="{{asset('../resources/img/iconos/cerrar_icon.svg')}}" alt="">
                    </div>
                    {{-- @method('') poner el método que iba en lugar de post--}}
                    <div class="tira_provisional_inputs">
                        <div class="cont_lbl_input">
                            <label class="lbl_create" for="">Número de tarjeta:</label>
                            <input class="input_create" type="text" name="id" value="{{old('id')}}" required>
                            @error('id')
                                <small class="leyenda_error_form">*{{$message}}</small>
                            @enderror
                        </div>
                        <div class="cont_lbl_input">
                            <label class="lbl_create" for="">Nombre:</label>
                            <input class="input_create" type="text" name="nombre" value="{{old('nombre')}}" required>
                            @error('nombre')
                                <small class="leyenda_error_form">*{{$message}}</small>
                            @enderror
                        </div>
                        <div class="cont_lbl_input">
                            <label class="lbl_create" for="">Primer apellido:</label>
                            <input class="input_create" type="text" name="prim_apellido" value="{{old('prim_apellido')}}" required>
                            @error('prim_apellido')
                                <small class="leyenda_error_form">*{{$message}}</small>
                            @enderror
                        </div>
                        <div class="cont_lbl_input">
                            <label class="lbl_create" for="">Segundo apellido:</label>
                            <input class="input_create" type="text" name="seg_apellido" value="{{old('seg_apellido')}}" required>
                            @error('seg_apellido')
                                <small class="leyenda_error_form">*{{$message}}</small>
                            @enderror
                        </div>
                        <div class="cont_lbl_input">
                            <label class="lbl_create" for="">Email:</label>
                            <input class="input_create" type="email" name="email" value="{{old('email')}}" required>
                            @error('email')
                                <small class="leyenda_error_form">*{{$message}}</small>
                            @enderror
                        </div>
                        <div class="cont_lbl_input">
                            <label class="lbl_create" for="">Contraseña:</label>
                            <input class="input_create" type="password" name="password" required>
                            @error('password')
                                <small class="leyenda_error_form">*{{$message}}</small>
                            @enderror
                        </div>
                        <div class="cont_lbl_input">
                            <label class="lbl_create" for="">Repetir contraseña:</label>
                            <input class="input_create" type="password" name="password_confirmation" required>
                            @error('password_confirmation')
                                <small class="leyenda_error_form">*{{$message}}</small>
                            @enderror
                        </div>
                        <div class="cont_lbl_input">
                            <label class="lbl_create" for="">Fecha de nacimiento:</label>
                            <input class="input_create" type="date" name="fecha_nacimiento" value="{{old('fecha_nacimiento')}}" required>
                            @error('fecha_nacimiento')
                                <small class="leyenda_error_form">*{{$message}}</small>
                            @enderror
                        </div>
                        <div class="cont_lbl_input">
                            <label class="lbl_create" for="">Fecha de ingreso a la instutución:</label>
                            <input class="input_create" type="date" name="fecha_ingreso_institucion" value="{{old('fecha_ingreso_institucion')}}" required>
                            @error('fecha_ingreso_institucion')
                                <small class="leyenda_error_form">*{{$message}}</small>
                            @enderror
                        </div>
                        <div class="cont_lbl_input">
                            <label class="lbl_create" for="">Fecha de ingreso a la SEP:</label>
                            <input class="input_create" type="date" name="fecha_ingreso_sep" value="{{old('fecha_ingreso_sep')}}" required>
                            @error('fecha_ingreso_sep')
                                <small class="leyenda_error_form">*{{$message}}</small>
                            @enderror
                        </div>
                        <div class="cont_lbl_input">
                            <label class="lbl_create" for="">RFC:</label>
                            <input class="input_create" type="text" name="rfc" value="{{old('rfc')}}" required>
                            @error('rfc')
                                <small class="leyenda_error_form">*{{$message}}</small>
                            @enderror
                        </div>
                        <div class="cont_lbl_input">
                            <label class="lbl_create" for="">Grado escolar:</label>
                            <select class="input_create"  name="grado_escolar" value="{{old('grado_escolar')}}" required>
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
                            <select class="input_create" name="area_adscripcion" value="{{old('area_adscripcion')}}" required>
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
                        <button type="button" class="btn_cerrar_modal btn_cancelar estilos_compartidos_btn" value="Cancelar">Cancelar y volver al listado</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="{{asset('../resources/js/profesores3_scripts.js')}}"></script>
    <script src="{{asset('../resources/js/menuLateral_scripts2.js')}}"></script>
@endsection