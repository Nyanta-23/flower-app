<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

    <!-- FontAwesome JS-->
    <script defer src="/theme/plugins/fontawesome/js/all.min.js"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="/theme/css/portal.css" />
    @stack('styles')
</head>

<body class="app">
    <header class="app-header fixed-top">
        <div class="app-header-inner">
            <div class="container-fluid py-2">
                <div class="app-header-content">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                    viewBox="0 0 30 30" role="img">
                                    <title>Menu</title>
                                    <path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10"
                                        stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path>
                                </svg>
                            </a>
                        </div>

                        <div class="app-utilities col-auto">
                            <div class="app-utility-item app-user-dropdown dropdown">
                                <a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown"
                                    href="#" role="button" aria-expanded="false"><img
                                        src="/theme/images/user.png" alt="user profile" /></a>
                                <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider" />
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}">Log Out</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.navigation')
    </header>

    <div class="app-wrapper">
        {{ $slot }}

        <footer class="app-auth-footer">
            <div class="container text-center py-3">
                <small class="copyright">
                    Build with <span class="sr-only">love</span><i class="fas fa-heart" style="color: #fb866a;"></i>
                    by Mahasiswa Unsap
                </small>
            </div>
        </footer>
    </div>

    <script src="/theme/plugins/popper.min.js"></script>
    <script src="/theme/plugins/bootstrap/js/bootstrap.min.js"></script>

    <script src="/theme/plugins/chart.js/chart.min.js"></script>
    {{-- <script src="/theme/js/index-charts.js"></script> --}}
    <script src="/theme/js/app.js"></script>
    @stack('scripts')
</body>

</html>
