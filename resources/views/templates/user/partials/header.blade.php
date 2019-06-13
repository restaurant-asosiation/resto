<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Asosiasi Resto</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500"> 
    <link rel="stylesheet" href="{{ asset('assets/user/fonts/icomoon/style.css') }}">
    
    <link rel="stylesheet" href="{{ asset('assets/user/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/animate.css') }}">
    
    
    <link rel="stylesheet" href="{{ asset('assets/user/fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/fl-bigmug-line.css') }}">
  
    <link rel="stylesheet" href="{{ asset('assets/user/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/user/css/style.css') }}">
    
  </head>
  <body>
  
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
  
    
    <header class="site-navbar py-1" role="banner">

      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-6 col-xl-2">
            <h1 class="mb-0"><a href="{{ route('user.index') }}" class="text-black h2 mb-0">Asosiasi<strong>Resto</strong></a></h1>
          </div>

          <div class="col-10 col-xl-10 d-none d-xl-block">
            <nav class="site-navigation text-right" role="navigation">

              <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                @if (auth()->id())
                  <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->name }} <span class="caret"></span>
                      </a>

                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                          </a>
                          {{-- <a class="dropdown-item" href="{{ route('resign') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                          </a> --}}
          

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                      </div>
                  </li>

                {{-- <li class="active"><a href="{{ route('user.index') }}">Home</a></li>
                <li><a href="{{ route('user.view.create') }}">Contact</a></li>
                <li><a href="{{ route('logout') }}"><span class="rounded bg-primary py-2 px-3 text-white"><span
                  class="h5 mr-2"></span> Logout </span></a></li> --}}
                    
                @else 

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>

                {{-- <li class="active"><a href="{{ route('user.index') }}">Home</a></li>
                <li><a href="{{ route('user.view.create') }}">Contact</a></li>
                <li><a href="{{ route('login') }}"><span class="rounded bg-primary py-2 px-3 text-white"><span
                  class="h5 mr-2"></span> Login </span></a></li> --}}
                    
                @endif

          
                {{-- <li><a href="{{ route('user.edit') }}">Profile</a></li> --}}
              </ul>
            </nav>
          </div>

          <div class="col-6 col-xl-2 text-right d-block">
            
            <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

          </div>

        </div>
      </div>
      
    </header>
