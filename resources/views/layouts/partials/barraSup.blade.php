<div class="header_barra_superior">
    <div class="barra_superior">
        <div>
            <img class="img_menu_burguer" id="img_menu_burguer" src="{{asset('../resources/img/iconos/burguer_menu.svg')}}" alt="">
        </div>
        {{-- <img class="logo_tecnm_barra_superior" src="{{asset('../resources/img/log_tecnm_blanco.png')}}" alt=""> --}}
        @if(auth()->check())
        <div>{{auth()->user()->name}}</div>
        <button class="button_login_logout" id="button_login_logout">
            Cerrar sesión
        </button>
        @else
            <a href="{{route('login')}}"><button class="button_login_logout" id="button_login_logout">
                Iniciar sesión
            </button></a>
        @endif
    </div>
</div>