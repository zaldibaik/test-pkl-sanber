<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
<!-- Nucleo Icons -->
<link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
<link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<!-- Material Icons -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
<!-- CSS Files -->
<link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />

@vite(['resources/sass/app.scss', 'resources/js/app.js'])


<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
        <a class="navbar-brand m-0" href=" #" target="_blank">
            <img src="../assets/img/desigen-blue.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">Zaldi</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('home') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class=" nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('employees.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Karyawan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('admins.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Management Users</span>
                </a>
            </li>
            </li>
        </ul>
    </div>
</aside>
<nav class="navbar navbar-expand-md navbar-gradient-dark shadow-sm ">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>
            <ul class="navbar-nav ms-auto ">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
                    
                @endguest
            </ul>
        </div>
    </div>
</nav>

<body>
    <div id="app">

        

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/chartjs.min.js"></script>
    <script>
        var ctx = document.getElementById("chart-bars").getContext("2d");



        var ctx2 = document.getElementById("chart-line").getContext("2d");

        new Chart(ctx2, {
            type: "line"
            , data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
                , datasets: [{
                    label: "Mobile apps"
                    , tension: 0
                    , borderWidth: 0
                    , pointRadius: 5
                    , pointBackgroundColor: "rgba(255, 255, 255, .8)"
                    , pointBorderColor: "transparent"
                    , borderColor: "rgba(255, 255, 255, .8)"
                    , borderColor: "rgba(255, 255, 255, .8)"
                    , borderWidth: 4
                    , backgroundColor: "transparent"
                    , fill: true
                    , data: [50, 40, 300, 320, 500, 350, 200, 230, 500]
                    , maxBarThickness: 6

                }]
            , }
            , options: {
                responsive: true
                , maintainAspectRatio: false
                , plugins: {
                    legend: {
                        display: false
                    , }
                }
                , interaction: {
                    intersect: false
                    , mode: 'index'
                , }
                , scales: {
                    y: {
                        grid: {
                            drawBorder: false
                            , display: true
                            , drawOnChartArea: true
                            , drawTicks: false
                            , borderDash: [5, 5]
                            , color: 'rgba(255, 255, 255, .2)'
                        }
                        , ticks: {
                            display: true
                            , color: '#f8f9fa'
                            , padding: 10
                            , font: {
                                size: 14
                                , weight: 300
                                , family: "Roboto"
                                , style: 'normal'
                                , lineHeight: 2
                            }
                        , }
                    }
                    , x: {
                        grid: {
                            drawBorder: false
                            , display: false
                            , drawOnChartArea: false
                            , drawTicks: false
                            , borderDash: [5, 5]
                        }
                        , ticks: {
                            display: true
                            , color: '#f8f9fa'
                            , padding: 10
                            , font: {
                                size: 14
                                , weight: 300
                                , family: "Roboto"
                                , style: 'normal'
                                , lineHeight: 2
                            }
                        , }
                    }
                , }
            , }
        , });

        var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

        new Chart(ctx3, {
            type: "line"
            , data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
                , datasets: [{
                    label: "Mobile apps"
                    , tension: 0
                    , borderWidth: 0
                    , pointRadius: 5
                    , pointBackgroundColor: "rgba(255, 255, 255, .8)"
                    , pointBorderColor: "transparent"
                    , borderColor: "rgba(255, 255, 255, .8)"
                    , borderWidth: 4
                    , backgroundColor: "transparent"
                    , fill: true
                    , data: [50, 40, 300, 220, 500, 250, 400, 230, 500]
                    , maxBarThickness: 6

                }]
            , }
            , options: {
                responsive: true
                , maintainAspectRatio: false
                , plugins: {
                    legend: {
                        display: false
                    , }
                }
                , interaction: {
                    intersect: false
                    , mode: 'index'
                , }
                , scales: {
                    y: {
                        grid: {
                            drawBorder: false
                            , display: true
                            , drawOnChartArea: true
                            , drawTicks: false
                            , borderDash: [5, 5]
                            , color: 'rgba(255, 255, 255, .2)'
                        }
                        , ticks: {
                            display: true
                            , padding: 10
                            , color: '#f8f9fa'
                            , font: {
                                size: 14
                                , weight: 300
                                , family: "Roboto"
                                , style: 'normal'
                                , lineHeight: 2
                            }
                        , }
                    }
                    , x: {
                        grid: {
                            drawBorder: false
                            , display: false
                            , drawOnChartArea: false
                            , drawTicks: false
                            , borderDash: [5, 5]
                        }
                        , ticks: {
                            display: true
                            , color: '#f8f9fa'
                            , padding: 10
                            , font: {
                                size: 14
                                , weight: 300
                                , family: "Roboto"
                                , style: 'normal'
                                , lineHeight: 2
                            }
                        , }
                    }
                , }
            , }
        , });

    </script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }

    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>
</html>