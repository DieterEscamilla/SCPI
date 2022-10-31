@extends('layouts.app')
@extends('layouts.partials.tituloSeccion')
@section('title','Alumnos')
<link rel="stylesheet" href="{{asset('../resources/css/barraSup_styles10.css')}}">
<link rel="stylesheet" href="{{asset('../resources/css/menuLateral_styles5.css')}}">
<link rel="stylesheet" href="{{asset('../resources/css/tabla_styles6.css')}}">
<link rel="stylesheet" href="{{asset('../resources/css/titulo_seccion_styles.css')}}">
<link rel="stylesheet" href="{{asset('../resources/css/agregar_formulario_styles12.css')}}">
<link rel="stylesheet" href="{{asset('../resources/css/barra_scroll_styles.css')}}">
<link rel="stylesheet" href="{{asset('../resources/css/editar_formulario_styles2.css')}}">
<link rel="icon" href="{{asset('../resources/img/logo_tecnm.png')}}" type="image/png">
@section('header')
    @extends('layouts.partials.barraSup')
    @section('tituloSeccion','Alumnos registrados')
    @section('iconoSeccion')
        <img class="icono_profesor" src="{{asset('../resources/img/iconos/estudiante_icon.svg')}}" alt="">
    @endsection
@endsection
@section('main')
    @extends('layouts.partials.menuLat')
    <div class="cont_tabla">
        <table class="tabla">
            <thead class="cabecera_tabla">
                <tr>
                    <td class="tdh campo_cabecera_tabla_izquierdo">Nombre</td>
                    <td class="tdh">Número de control</td>
                    <td class="tdh">Carrera</td>
                    {{-- <td class="tdh">Fecha de ingreso a la escuela</td> --}}
                    <td class="tdh">Correo</td>
                    {{-- <td class="tdh">Edad</td> --}}
                    <td class="tdh campo_cabecera_tabla_derecho">Acciones</td>
                </tr>
            </thead>
            <tbody class="cuerpo_tabla">
                @foreach($datos as $alumno)
                    <tr>
                        
                        <td class="tdb nombre_completo">{{$alumno->nombre}} {{$alumno->primerApellido}} {{$alumno->segundoApellido}}</td>
                        {{-- <td class="elementos_ocultos_tabla">{{$alumno->primerApellido}}</td>
                        <td class="elementos_ocultos_tabla">{{$alumno->segundoApellido}}</td> --}}
                        <td class="tdb">{{$alumno->id}}</td>
                        <td class="tdb">{{$alumno->carrera}}</td>
                        <td class="tdb">{{$alumno->email}}</td>       
                        <td class="tdb elementos_ocultos_tabla edad_calculada">{{\Carbon\Carbon::parse($alumno->fechaNacimiento)->age;}}</td>
                        <td class="elementos_ocultos_tabla">{{$alumno->fechaNacimiento}}</td>
                        <td class="tdb elementos_ocultos_tabla">{{$alumno->fechaIngresoEscuela}}</td>
                        <td class="tdb">
                            @can('avanzado.eliminar')
                                <img class="iconos_acciones_tabla" src="{{asset('../resources/img/iconos/icono_eliminar.svg')}}" alt="">
                            @endcan()
                            <img class="iconos_acciones_tabla btn_lapiz_actualizar_modal" src="{{asset('../resources/img/iconos/icono_actualizar.svg')}}" alt="">
                            <img class="iconos_acciones_tabla btn_ojo_ver_detalles_modal" src="{{asset('../resources/img/iconos/ojo_icono.svg')}}" alt="">
                        </td>
                    </tr>
                @endforeach
                <tr class="fila_boton_agregar">
                    <td colspan="7" class="tdb"><button class="btn_agregar_tabla" type="button" id="btn_agregar_alumno">Agregar nuevo alumno</button></td>
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
                    <label class="lbl_key_modal_datos_tabla" for="">Número de control:</label>
                    <label class="elemento_modal_tabla" for=""></label>
                </div>
                <div class="cont_key_dato_modal_tabla">
                    <label class="lbl_key_modal_datos_tabla" for="">Carrera:</label>
                    <label class="elemento_modal_tabla" for=""></label>
                </div>
                <div class="cont_key_dato_modal_tabla">
                    <label class="lbl_key_modal_datos_tabla" for="">Email:</label>
                    <label class="elemento_modal_tabla" for=""></label>
                </div>
                <div class="cont_key_dato_modal_tabla">
                    <label class="lbl_key_modal_datos_tabla" for="">Edad:</label>
                    <label class="elemento_modal_tabla" for=""></label>
                </div>
                <div class="cont_key_dato_modal_tabla">
                    <label class="lbl_key_modal_datos_tabla" for="">Fecha nacimiento:</label>
                    <label class="elemento_modal_tabla" for=""></label>
                </div>
                <div class="cont_key_dato_modal_tabla">
                    <label class="lbl_key_modal_datos_tabla" for="">Fecha de ingreso a la escuela:</label>
                    <label class="elemento_modal_tabla" for=""></label>
                </div>
                <div class="cont_btn_rectangulo_cerrar_modal_detalles">
                    <button class="btn_rectangulo_cerrar_modal_detalles btn_cerrar_modal_detalles" type="button">Aceptar</button>
                </div>
            </div>
        </div>
        <div class="overlay" id="overlay">
            <div class="modal">     
                <form class="form_create_alumno" id="form_create_alumno" action="{{route('alumnoregistro.store')}}" method="POST">
                    <div class="cont_titulo_form_agreagr btn_cerrar" id="btn_cerrar_modal">
                        <h3>Agregar nuevo alumno</h3>
                        <img class="icono_cerrar_form" src="{{asset('../resources/img/iconos/cerrar_icon.svg')}}" alt="">
                    </div>
                    @csrf
                    {{-- @method('') poner el método que iba en lugar de post--}}
                    <div class="tira_provisional_inputs">
                        <div class="cont_lbl_input">
                            <label class="lbl_create" for="">Número de control:</label>
                            <input class="input_create" type="text" name="id" value="{{old('id')}}" required>
                            @error('id')
                                <small class="leyenda_error_form">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="cont_lbl_input">
                            <label class="lbl_create" for="">Nombre:</label>
                            <input class="input_create" type="text" name="nombre" value="{{old('nombre')}}" required>
                            @error('nombre')
                                <small class="leyenda_error_form">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="cont_lbl_input">
                            <label class="lbl_create" for="">Primer apellido:</label>
                            <input class="input_create" type="text" name="prim_apellido" value="{{old('prim_apellido')}}" required>
                            @error('prim_apellido')
                                <small class="leyenda_error_form">{{$message}}</small>
        
                            @enderror
                        </div>
                        <div class="cont_lbl_input">
                            <label class="lbl_create" for="">Segundo apellido:</label>
                            <input class="input_create" type="text" name="seg_apellido" value="{{old('seg_apellido')}}" required>
                            @error('seg_apellido')
                                <small class="leyenda_error_form">{{$message}}</small>
        
                            @enderror
                        </div>
                        <div class="cont_lbl_input">
                            <label class="lbl_create" for="">Correo:</label>
                            <input class="input_create" type="email" name="email" value="{{old('email')}}" required>
                            @error('email')
                                <small class="leyenda_error_form">{{$message}}</small>
        
                            @enderror
                        </div>
                        <div class="cont_lbl_input">
                            <label class="lbl_create" for="">Contraseña:</label>
                            <input class="input_create" type="password" name="password" required>
                            @error('password')
                                <small class="leyenda_error_form">{{$message}}</small>
        
                            @enderror
                        </div>
                        <div class="cont_lbl_input">
                            <label class="lbl_create" for="">Confirmar contraseña:</label>
                            <input class="input_create" type="password" name="password_confirmation" required>
                            @error('password_confirmation')
                                <small class="leyenda_error_form">{{$message}}</small>
        
                            @enderror
                        </div>
                        <div class="cont_lbl_input">
                            <label class="lbl_create" for="">Fecha de ingreso a la escuela:</label>
                            <input class="input_create" type="date" name="fecha_ingreso_escuela" value="{{old('fecha_ingreso_escuela')}}" required>
                            @error('fecha_ingreso_escuela')
                                <small class="leyenda_error_form">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="cont_lbl_input">
                            <label class="lbl_create" for="">Fecha de nacimiento:</label>
                            <input class="input_create" type="date" name="fecha_nacimiento" value="{{old('fecha_nacimiento')}}" required>
                            @error('fecha_nacimiento')
                                <small class="leyenda_error_form">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="cont_lbl_input">
                            <label class="lbl_create" for="">Carrera:</label>
                            <select class="input_create" name="carrera" value="{{old('carrera')}}" required>
                                <option value="">Seleccionar carrera...</option>
                                <option value="Ingeniería en TIC's">Ingeniería en TIC's</option>
                                <option value="Ingeniería en agronomía">Ingeniería en agronomía</option>
                                <option value="Ingeniería en industrias de alimentos">Ingeniería en industrias de alimentos</option>
                                <option value="Ingeniería en gestión empresarial">Ingeniería en gestión empresarial</option>
                            </select>
                            @error('carrera')
                                <small class="leyenda_error_form">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="cont_lbl_input">
                            <label class="lbl_create" for="">Permisos del usuario:</label>
                            {{-- En caso de que este campo deba ir en el form, preguntar todas las áreas de adscipción existentes --}}
                            <select class="input_create" name="permisos" value="{{old('permisos')}}" required>
                                <option value="">Seleccionar área...</option>
                                <option value="avanzado">Avanzado</option>
                                <option value="basico">Básico</option>
                            </select>
                            @error('permisos')
                                <small class="leyenda_error_form">*{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="cont_btns_formulario">
                        <input class="btn_aceptar estilos_compartidos_btn" id="" type="submit" value="Agregar">
                        <button type="button" class="btn_cerrar btn_cancelar estilos_compartidos_btn" value="Cancelar">Cancelar y volver al listado</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="overlay_editar" id="overlay_editar_alumno">
            <div class="modal_editar_alumno">     
                <form class="form_editar" id="form_editar_alumno" action="{{route('alumnos.update')}}" method="POST">
                    <div class="cont_titulo_form_agreagr btn_cerrar" id="btn_cerrar_modal">
                        <h3>Editar datos de un alumno</h3>
                        <img class="icono_cerrar_form cerrar_modal_edit" src="{{asset('../resources/img/iconos/cerrar_icon.svg')}}" alt="">
                    </div>
                    @csrf
                    @method('put')
                    <div class="tira_provisional_inputs">
                        <div class="cont_lbl_input">
                            <label class="lbl_create" for="">Nombre:</label>
                            <input class="input_create input_editar_elemento" type="text" name="nombre" value="" required>
                            @error('nombre')
                                <small class="leyenda_error_form">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="cont_lbl_input">
                            <label class="lbl_create" for="">Primer apellido:</label>
                            <input class="input_create input_editar_elemento" type="text" name="prim_apellido" value="" required>
                            @error('prim_apellido')
                                <small class="leyenda_error_form">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="cont_lbl_input">
                            <label class="lbl_create" for="">Segundo apellido:</label>
                            <input class="input_create input_editar_elemento" type="text" name="seg_apellido" value="" required>
                            @error('seg_apellido')
                                <small class="leyenda_error_form">{{$message}}</small>
        
                            @enderror
                        </div>
                        <div class="cont_lbl_input">
                            <label class="lbl_create" for="">Número de control:</label>
                            <input class="input_create input_editar_elemento" type="text" name="id" value="" required>
                            @error('id')
                                <small class="leyenda_error_form">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="cont_lbl_input">
                            <label class="lbl_create" for="">Carrera:</label>
                            <select class="input_create input_editar_elemento" name="carrera" value="" required>
                                <option value="">Seleccionar carrera...</option>
                                <option value="Ingeniería en TIC's" selected>Ingeniería en TIC's</option>
                                <option value="Ingeniería en agronomía">Ingeniería en agronomía</option>
                                <option value="Ingeniería en industrias de alimentos">Ingeniería en industrias de alimentos</option>
                                <option value="Ingeniería en gestión empresarial">Ingeniería en gestión empresarial</option>
                            </select>
                            @error('carrera')
                                <small class="leyenda_error_form">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="cont_lbl_input">
                            <label class="lbl_create" for="">Correo:</label>
                            <input class="input_create input_editar_elemento" type="email" name="email" value="" required>
                            @error('email')
                                <small class="leyenda_error_form">{{$message}}</small>
        
                            @enderror
                        </div>
                        <div class="cont_lbl_input">
                            <label class="lbl_create" for="">Fecha de nacimiento:</label>
                            <input class="input_create input_editar_elemento" type="date" name="fecha_nacimiento" value="" required>
                            @error('fecha_nacimiento')
                                <small class="leyenda_error_form">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="cont_lbl_input">
                            <label class="lbl_create" for="">Fecha de ingreso a la escuela:</label>
                            <input class="input_create input_editar_elemento" type="date" name="fecha_ingreso_escuela" value="" required>
                            @error('fecha_ingreso_escuela')
                                <small class="leyenda_error_form">{{$message}}</small>
                            @enderror
                        </div>
                        
                    </div>
                    
                    <div class="cont_btns_formulario">
                        <input class="btn_aceptar estilos_compartidos_btn" id="" type="submit" value="Agregar">
                        <button type="button" class="btn_cerrar btn_cancelar estilos_compartidos_btn cerrar_modal_edit" value="Cancelar">Cancelar y volver al listado</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="{{asset('../resources/js/alumno_scripts5.js')}}"></script>
    <script src="{{asset('../resources/js/alumno_editar_formulario.js')}}"></script>
    <script src="{{asset('../resources/js/menuLateral_scripts2.js')}}"></script>
    
@endsection

