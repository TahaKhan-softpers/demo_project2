<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta name=" viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>this is main page</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/bootstrap-4.5.2-dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/fontawesome-free-5.14.0-web/css/all.css')}}">

</head>
<body>
<div class="container-fluid navbar-spacing">
    <div class="row justify-content-center "> <!-- align self center -->
        <div class="col-11"><!--  this is where column starts -->

            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="{{url('mainview')}}"> MAIN SITE</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse my-2 my-lg-0 " id="navbarNavDropdown">
                    <ul class="navbar-nav ml-auto">
                        <!-- <li class="nav-item active">
                          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li> -->
                        <!-- <li class="nav-item">
                          <a class="nav-link" href="#">Features</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">Pricing</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('mainview') }}">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('post')}}">POST</a>
                        </li>
                        @if(Auth::user())
                            @if(Auth::user()->role=="ADMIN")
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('comment.index')}}">COMMENT</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('image.index')}}">IMAGE</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('user.index')}}">USER</a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('home')}}">DASHBOARD</a>
                            </li>
                        @endif
                        @if(Auth::user())
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    CRUD
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{url('post/create/')}}">CREATE POST</a>
                                    <a class="dropdown-item" href="{{url('post/')}}">SEE POST</a>

                                    <div class="dropdown-divider"></div>
                                    @if(Auth::user()->role=='ADMIN')
                                        <a class="dropdown-item" href="#">CREATE USER</a>
                                        <a class="dropdown-item" href="#">SHOW ALL USER</a>

                                        <div class="dropdown-divider"></div>

                                        <a class="dropdown-item" href="#">DELETE POST</a>
                                        <a class="dropdown-item" href="#">DELETE IMAGE</a>
                                        <a class="dropdown-item" href="#">DELETE COMMENT</a>
                                        <a class="dropdown-item" href="#">DELETE USER</a>
                                        <div class="dropdown-divider"></div>
                                    @endif


                                    <a class="dropdown-item" href="{{route('home')}}">DASHBOARD</a>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('login')}}">LOGIN</a>
                            </li>
                        @endif

                    </ul>
                </div>
            </nav>

            <!-- this is where navigation bar ends  -->
        </div> <!-- this is where column ends -->
    </div> <!-- this is where main row ends -->
</div> <!-- this is where container ends -->
