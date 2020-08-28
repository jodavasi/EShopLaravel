<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Argar') }}</title>
    
    <link rel="stylesheet" href="{{ asset('css/designForms/design.css') }}">
    <link rel="stylesheet" 
   href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
   integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
crossorigin="anonymous"> 
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    </head>
<body>
    <div id="app">
        
                <nav class="menu">
                    <ol id="men">

                      <li class="menu-item"><a href="{{ route('productos.index') }}">PRODUCTOS</a></li>
                      <li class="menu-item"><a href="{{ route('categorias.index') }}">CATEGORIAS</a></li>
                      <li class="menu-item"><a href="">ESTADISTICAS</a></li>
                      
                      @guest
                        <li class="menu-item">
                        <a  href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        @if (Route::has('register'))
                        <li class="menu-item">
                            <a  href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif

                        @else

                        <li class="menu-item">
                             <a href="#0">{{ Auth::user()->name }} </a>
                            <ol class="sub-menu">
                            <li class="menu-item"><a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                 {{ __('Logout') }}
                             </a></li>
                             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                             {{ csrf_field() }}
                             </form>

                             </ol>
                        </li>
                
                       @endguest
                    </ol>
                </nav>
             

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @yield('script')
    <!-- <script type="text/javascript" src="js/jquery-3.4.1.js"> </script> -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
</body>
</body>
</html>


