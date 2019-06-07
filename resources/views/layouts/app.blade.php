<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Dawi khawi') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/my-javascript.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <!--  My Css Style -->
    <link href="{{ asset('css/my-style.css') }}" rel="stylesheet">
        
    <!--  Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Jquery UI -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
    
    <!--  Bootstrap toggle -->
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.0/css/bootstrap-toggle.min.css" rel="stylesheet">
    
    <!-- Glyphicon -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Scripts -->
    <!--<script src="{{ asset('public/js/app.js') }}" defer></script>-->
        
    <script>
            window.Laravel = {!! json_encode([
                'csrfToken'=> csrf_token(),
                'user'=> [
                    'authenticated' => auth()->check(),
                    'id' => auth()->check() ? auth()->user()->id : null,
                    'name' => auth()->check() ? auth()->user()->name : null, 
                    ]
                ])
            !!};
    </script>
    
    <style>
            
            /* width */
            ::-webkit-scrollbar {
              width: 8px;
            }

            /* Track */
            ::-webkit-scrollbar-track {
              box-shadow: inset 0 0 5px grey; 
              border-radius: 10px;
            }

            /* Handle */
            ::-webkit-scrollbar-thumb {
              background: maroon; 
              border-radius: 10px;
            }

            /* Handle on hover */
            ::-webkit-scrollbar-thumb:hover {
              background: #b30000; 
            }
            
    </style>
    
</head>

<body>

      <nav class="navbar navbar-expand-md navbar-light navbar-laravel " style="border-bottom: 1px solid #C22030">
            <div class="container">

                  <a class="navbar-brand" href="{{ url('/') }}" style="padding: 5px">
                        <span style="font-size: 34px; color: whitesmoke; box-shadow: #0056b3"><i class="fas fa-comments"></i> Dawi khawi</span>
                  </a>

                  <button class="navbar-toggler" style="border: none" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon" style="background-color: whitesmoke; color: red; width: 2em; height: 2em; border: 1px solid black"></span>                    
                  </button>

                  <div class="collapse navbar-collapse" id="navbarSupportedContent">

                      <!-- Left Side Of Navbar -->
                      <ul class="navbar-nav mr-auto">

                      </ul> 

                      <!-- Right Side Of Navbar -->
                      <ul class="navbar-nav ml-auto pull-right">
                          <!-- Authentication Links -->
                          @guest
                                <li><a class="nav-link" href="{{ route('login') }}"  ><i class="fas fa-key"></i> Connexion</a></li>
                                <li><a class="nav-link" href="{{ route('register') }}"><i class="fas fa-pencil-alt"></i> Inscription</a></li>
                          @else
                              <li class="nav-item dropdown">

                                      <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                           <i class="glyphicon glyphicon-user"></i> {{ Auth::user()->name }}  <span class="caret"></span>
                                      </a>

                                      <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: transparent !important; padding: 2px !important; font-size: 18px !important">

                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();" style="color: white !important; font-weight: bold">
                                                      <i class="glyphicon glyphicon-list-alt"></i> <b>Mon profil</b>
                                                </a>

                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();" style="color: white !important; font-weight: bold">
                                                      <i class="glyphicon glyphicon-log-out"></i> <b>Déconnexion</b>
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

      <main class="py-4" >
            <div class="toggler position-fixed">
                  <div id="effect">
                        <div class="loader" style="margin-left: 22%; margin-top: 5px"></div>
                  </div>
            </div>
            @yield('content')
      </main>
      
</body>

<!-- Latest compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery-latest.min.js"></script> 
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.0/js/bootstrap-toggle.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css" />

<!-- bOOTSTRAP -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<!-- Scripts -->
<!--<script src="{{ asset('js/app.js') }}"></script>-->

</html>
