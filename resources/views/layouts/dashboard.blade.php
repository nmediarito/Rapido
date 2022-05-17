<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Favicons -->
        <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
        <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
        <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
        <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
        <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
        <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">

    </head>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check" viewBox="0 0 16 16">
            <title>Check</title>
            <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
        </symbol>
    </svg>

    <body class="bg-white">
        <div class="container-fluid">
            <div class="row flex-nowrap">
                <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-light">
                    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                        <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                            <span class="fs-5 d-none d-sm-inline fs-4"><img class="w-100" src="{{ url('/images/rapidologo.png') }}" /></span>
                        </a>
                        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                            <li class="nav-item">
                                <a href="{{ route('customer.request.view') }}" class="nav-link align-middle px-0">
                                    <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline fs-4">Request service</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('customer.submissions') }}" class="nav-link align-middle px-0">
                                    <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline fs-4">Submitted service requests</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('customer.history') }}" class="nav-link align-middle px-0">
                                    <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline fs-4">Callout History</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('bank.view') }}" class="nav-link align-middle px-0">
                                    <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline fs-4">Bank details</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('job.invoices.view') }}" class="nav-link align-middle px-0">
                                    <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline fs-4">Job invoices</span>
                                </a>
                            </li>
                            <li>
                                <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                                    <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline fs-4">Vehicle options</span></a>
                                <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                                    <li class="w-100">
                                        <a href="{{ route('customer.register.view') }}" class="nav-link px-0"> <span class="d-none d-sm-inline fs-4">Register a vehicle</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('customer.vehicles.view') }}" class="nav-link px-0"> <span class="d-none d-sm-inline fs-4">View registered vehicles</span></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <hr>
                        <div class="dropdown pb-4">
                            <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y" width="100" height="100" class="rounded-circle">
                                <span class="d-none d-sm-inline mx-1 fs-4">{{ auth()->user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                                <li><a class="dropdown-item" href="{{ route('customer.profile.view') }}">Edit profile</a></li>
                                <li><a class="dropdown-item" href="{{ route('membership.register.view') }}"">Change membership</a></li>
                                <li><a class="dropdown-item" href="{{ route('balance.view') }}">Check balance</a></li>
                                <li><a class="dropdown-item" href="{{ route('customer.logout') }}">Sign out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col py-3">
                    @yield('content')
                </div>
            </div>
        </div>
        <!-- React JS -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>
