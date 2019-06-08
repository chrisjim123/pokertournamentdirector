<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>



  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" id="bootstrap-css">
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  



    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Emperor City Poker PTD</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/profileapp.js') }}" defer></script>
    <script src="{{ asset('js/jquery2.min.js') }}" ></script>
    <script src="{{ asset('js/bootstrap2.min.js') }}"></script>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap3.3.7/css/bootstrap.min.css') }}">


 


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Emperor City Poker PTD
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto pull-right" >
                        <!-- Authentication Links -->
                        @guest
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            <li class="nav-item">
                            </li>
                           <!--  <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li> -->
                        @else

                          
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
        <!--         <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Notification</strong>
                            {{ session('status') }}
                        </div>
                    @endif
                    </div> -->
            @yield('content')
        </main>
    </div>
</body>
</html>
