<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{ asset('storage/images/logo1.png') }}" type="image/x-icon">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="antialiased" style="background-color: #eceff1">
    <div id="app">
        <nav class="navbar navbar-light bg-dark shadow sticky-top">
            <div class="container">
                <a class=" navbar-nav navbar-brand" data-bs-toggle="offcanvas" data-bs-target="#offcanvas"
                    role="button">
                    <lord-icon src="https://cdn.lordicon.com/wgwcqouc.json" trigger="morph"
                        colors="primary:#ffffff,secondary:#ffffff" stroke="60" style="width:30px;height:30px"
                        data-bs-toggle="offcanvas" data-bs-target="#offcanvas">
                    </lord-icon>
                </a>
                <p class="navbar-brand mb-0 navbar-text text-truncate text-white">{{ __('Student\'s Portal') }}</p>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-none d-sm-block">
                    <li class="nav-item text-white">
                        <img src="{{ asset('/storage/images/avatar.png') }}" alt="" width="30"
                            height="30" class="rounded-circle">
                        {{ Auth::user()->name }}
                    </li>
                </ul>
            </div>
        </nav>
        <div class="offcanvas offcanvas-start w-auto text-white container bg-dark" tabindex="-1" id="offcanvas"
            data-bs-keyboard="true" data-bs-backdrop="true">
            {{-- <button type="button" class="btn-close text-reset text-end" data-bs-dismiss="offcanvas" aria-label="Close"></button> --}}
            <div class="offcanvas-header">
                <h6 class="offcanvas-title" id="offcanvas">
                    {{-- <button type="button" class="btn-close align-items-end btn-close-white text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button> --}}
                    <a href="{{ url('/') }}"
                        class="d-flex justify-content-center align-items-center mb-auto mb-md-0 text-center me-md-auto text-white text-decoration-none">
                        <img class="d-inline-block align-top rounded-circle border border-info border-3"
                            src="{{ asset('/storage/images/avatar.png') }}" height="60" width="60">
                    </a>
                    <span class="container fs-4">{{ Auth::user()->name }}</span>
                    <a class="nav-link"><span
                            class="text-info d-flex justify-content-center  text-uppercase small">{{ __('Student\'s Name') }}</span>
                    </a>
                </h6>
                {{-- <button type="button" class="btn-close btn-close-white text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button> --}}
            </div>
            <hr>
            <div class="offcanvas-body px-0 ">
                <ul class="nav nav-pills flex-column mb-sm-auto mb-auto mb-0 align-items-start" id="menu">
                    <li class="nav-item">
                        <a class="nav-link"><span
                                class="text-white text-muted text-uppercase small">{{ __('Navigation') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link text-truncate">
                            <i class="fs-5 fa-solid fa-house-chimney  text-white"></i><span class="ms-2 text-white"
                                aria-current="page">{{ __('Home') }}</span>
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link"><span
                                class="text-white text-muted text-uppercase small">{{ __('Enrolled') }}</span>
                        </a>
                    </li> --}}
                    <li class="nav-item">
                        <a href="{{ route('profile') }}" class="nav-link collapsed">
                            <i class="fs-4 fa-solid fa-user text-white"></i><span
                                class="ms-2  text-white">{{ __('Profile') }}</span></a>
                        {{-- <div class="collapse container" id="create-collapse">
                            <ul
                                class="btn-toggle-nav nav nav-pills flex-column mb-sm-auto mb-auto mb-0 align-items-start list-unstyled fw-normal pb-2">
                                <li class="nav-item"><a href="#"
                                        class="ms-2 nav-link  text-white text-decoration-none rounded"><i
                                            class="fs-5 fa-solid fa-angles-right"></i><span
                                            class="ms-2  text-white">Hello</span></a></li>
                            </ul>
                        </div> --}}
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('purchases') }}" class="nav-link text-truncate">
                            <i class="fs-5 fa-solid text-white fa-clock-rotate-left"></i><span class="ms-2 text-white"
                                aria-current="page">{{ __('History') }}</span>
                        </a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown">
                    <a href="{{ route('logout') }}" class="d-flex px-3 align-items-center nav-link text-truncate"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt fs-5 text-white"></i><span
                            class="ms-2 text-white">{{ __('Sign out') }}</span> </a>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row py-2">
                <div class="col p-2">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.lordicon.com/lusqsztk.js"></script>

</html>
