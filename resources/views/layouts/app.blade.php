<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MIPRO Modelo Integrado Proyecto de Inversión') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('css')


      <!-- Styles Menu deslizable-->
     <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Dosis'>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @yield('css')
     <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
     <script src="{{ asset('js/index.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'MIPRO - Modelo Integrado Proyecto de Inversión') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Entrar') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>







<!--Inicio Menu deslizable -->
  <div id="menu-container">
   <div id="menu-wrapper">
      <div id="hamburger-menu"><span></span><span></span><span></span></div>
      <!-- hamburger-menu -->
   </div>
   <!-- menu-wrapper -->
   <ul class="menu-list accordion">
      <li id="nav1" class="toggle accordion-toggle"> 
         <span class="icon-plus"></span>
         <a class="menu-link" href="#">Gestión del Proyecto</a>
      </li>
      <!-- accordion-toggle -->
      <ul class="menu-submenu accordion-content">
         <li><a class="head" href="{{ route('proyectos.index') }}">Proyectos</a></li>
         <li><a class="head" href="{{ route('promotor.index') }}">Promotores</a></li>
      </ul>
     
     
      <!-- menu-submenu accordon-content-->
      <li id="nav2" class="toggle accordion-toggle"> 
         <span class="icon-plus"></span>
         <a class="menu-link" href="#">Idea de Negocios</a>
      </li>
      <!-- accordion-toggle -->
      <ul class="menu-submenu accordion-content">
         <li><a class="head" href="{{ route('idea.tabla') }}">Idea</a></li>
         <li><a class="head" href="{{ route('canvas.create') }}">Canvas</a></li>
      </ul>
    
      <!-- menu-submenu accordon-content-->
      <li id="nav3" class="toggle accordion-toggle"> 
         <span class="icon-plus"></span>
         <a class="menu-link" href="#">Estudio de Mercado</a>
      </li>
      
      <!-- accordion-toggle -->
      <ul class="menu-submenu accordion-content">
         <li><a class="head" href="{{ route('a.tabla') }}">Antecedentes</a></li>
         <li><a class="head" href="{{ route('contenedor.index') }}">Marco Lógico</a></li>
         <li><a class="head" href="{{ route('pastel.index') }}">Análisis de Entorno</a></li>
         <li><a class="head" href="{{ route('foda.tabla') }}">Análisis de Empresa</a></li>
         <li><a class="head">Investigación de Mercado</a></li>
         <li><a class="head" href="{{ route('serietemporal.index') }}">- Serie Temporales</a></li>
         <li><a class="head" href="{{ route('regresion.index') }}">- Regresión</a></li>
         <li><a class="head" href="{{ route('proyeccion.index') }}">- Proyección</a></li>
         <li><a class="head" href="{{ route('marketGap') }}">- Brecha de Mercado</a></li>

      </ul> 
      
         
         
      </ul>
      <!-- menu-submenu accordon-content-->
   </ul>
   <!-- menu-list accordion-->
</div>


<!--Fin Menu deslizable -->




	<div>
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    @yield('js')
</body>
</html>


