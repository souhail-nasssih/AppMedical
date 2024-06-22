<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <title>Medical</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboardMedecin/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboardMedecin/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboardMedecin/assets/css/fullcalendar.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboardMedecin/assets/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css"
    href="{{ asset('dashboardMedecin/assets/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboardMedecin/assets/css/style.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('sitePublic/assets/img/favicon.ico') }}">
    {{-- <!--[if lt IE 9]>
        <script src="{{ asset('dashboardMedecin/assets/js/html5shiv.min.js') }}"></script>
        <script src="{{ asset('dashboardMedecin/assets/js/respond.min.js') }}"></script>
    <![endif]-->   --}}
</head>


<body>
    @php
    // je veux id de patient qui a une relation avec user qui est auth maintenant
    $idP = Auth::user()->id;
    $patient = App\Models\Patient::where('user_id', $idP)->first();
@endphp
    <div class="main-wrapper">
        <div class="header">
            <div class="header-left">
                <a href="{{ Route('home') }}" class="logo">
                    <img src="{{ asset('sitePublic/assets/img/logo/loder.png') }}" width="35" height="35"
                        alt=""> <span>Medical</span>
                </a>
            </div>
            <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu float-right">

                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img"><img class="rounded-circle"
                                src="{{ asset('dashboardMedecin/assets/img/user.jpg') }}" width="40" alt="Admin">
                            <span class="status online"></span></span>
                        <span>{{ Auth::user()->name }}</span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('ProfilePatient', [$patient]) }}">Profile</a>
                        <!-- For the logout route, use a form to handle the POST request -->
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Déconnexion
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                    </div>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu float-right">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                        class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{ route('ProfilePatient', [$patient]) }}">Profile</a>
                    <!-- For the logout route, use a form to handle the POST request -->
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Déconnexion
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                </div>
            </div>
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li>
                            <a href="{{ Route('dashboard') }}" class="nav-link" id="home"><i
                                    class="fa fa-dashboard {{ Route::currentRouteName() == 'dashboard' ? 'active-link' : '' }}"></i>
                                <span>Accueil</span></a>
                        </li>
                        {{-- <li>
                            <a href="" class="nav-link nav1" id="doctors"><i
                                    class="fa fa-user-md"></i>
                                <span>Doctors</span></a>
                        </li> --}}
                 
                        <li>
                            <a href="{{ route('patientOrdonnances', [$patient]) }}"
                                class="nav-link {{ Route::currentRouteName() == 'patientOrdonnances' ? 'active-link' : '' }}">
                                <i class="fa fa-user"></i>
                                <span>Ordonnances</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('patientOrdonnancesAnalyse', [$patient]) }}"
                                class="nav-link {{ Route::currentRouteName() == 'patientOrdonnancesAnalyse' ? 'active-link' : '' }}">
                                <i class="fa fa-wheelchair"></i>
                                <span>Analyses/Radio</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('medecinsPatient', [$patient]) }}"
                                class="nav-link {{ Route::currentRouteName() == 'medecinsPatient' ? 'active-link' : '' }}">
                                <i class="fa fa-calendar-check-o"></i>
                                <span>Médecins</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('ProfilePatient', [$patient]) }}"
                                class="nav-link {{ Route::currentRouteName() == 'ProfilePatient' ? 'active-link' : '' }}"><i
                                    class="fa fa-cog"></i> <span>Profile</span></a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        @yield('content')


        <div class="sidebar-overlay" data-reff=""></div>
        <footer>
            <script src="{{ asset('dashboardMedecin/assets/js/jquery-3.2.1.min.js') }}"></script>
            <script src="{{ asset('dashboardMedecin/assets/js/popper.min.js') }}"></script>
            <script src="{{ asset('dashboardMedecin/assets/js/bootstrap.min.js') }}"></script>
            <script src="{{ asset('dashboardMedecin/assets/js/jquery.slimscroll.js') }}"></script>
            <script src="{{ asset('dashboardMedecin/assets/js/app.js') }}"></script>
            <script src="{{ asset('dashboardMedecin/assets/js/Chart.bundle.js') }}"></script>
            <script src="{{ asset('dashboardMedecin/assets/js/chart.js') }}"></script>
            {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}
            <script></script>

</body>

</html>
</footer>
