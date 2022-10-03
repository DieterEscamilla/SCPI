<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" href="{{asset('../resources/img/logo_tecnm.png')}}" type="image/png">
</head>
<body id="body">
    <header>
        @yield('header')
    </header>
    <main>
        @yield('main')
    </main>
    {{-- @yield('body') --}}
    {{-- <script src="{{asset('../resources/js/menuLateral_scripts2.js')}}"></script>
    <script src="{{asset('../resources/js/alumno_scripts.js')}}"></script> --}}
    <div class="scripts">
        @yield('scripts')
    </div> 
</body>
</html>