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
    {{-- <!--[if lt IE 9]>
        <script src="{{ asset('dashboardMedecin/assets/js/html5shiv.min.js') }}"></script>
        <script src="{{ asset('dashboardMedecin/assets/js/respond.min.js') }}"></script>
    <![endif]-->   --}}
</head>


<body>
    <div class="main-wrapper">
        <div class="header">
            <div class="header-left">
                <a href="http://127.0.0.1:8000/" class="logo">
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
                        <a class="dropdown-item" href="{{ route('medecin.show',Auth::user()->id) }}">My Profile</a>
                        <!-- For the logout route, use a form to handle the POST request -->
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
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
                    <a class="dropdown-item" href="{{ route('profile.edit') }}">My Profile</a>
                    <!-- For the logout route, use a form to handle the POST request -->
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
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
                            <a href="{{ Route('dashboard') }}" class="nav-link  nav1" id="home"><i class="fa fa-dashboard"></i>
                                <span>Dashboard</span></a>
                        </li>
                        {{-- <li>
                            <a href="" class="nav-link nav1" id="doctors"><i
                                    class="fa fa-user-md"></i>
                                <span>Doctors</span></a>
                        </li> --}}
                        <li>
                            <a href="{{ Route('search') }}" class="nav-link nav1" id="patients"><i class="fa fa-user"></i>
                                <span>Recherche</span></a>
                        </li>
                        <li>
                            <a href="{{ Route('listePatient') }}" class="nav-link nav1"><i class="fa fa-wheelchair"></i>
                                <span>Patients</span></a>
                        </li>
                        <li>
                            <a href="" class="nav-link nav1"><i class="fa fa-calendar-check-o"></i>
                                <span>Doctor Schedule</span></a>
                        </li>
                        <li>
                            <a href="departments.html"><i class="fa fa-hospital-o"></i> <span>Departments</span></a>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-user"></i> <span> Employees </span> <span
                                    class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="employees.html">Employees List</a></li>
                                <li><a href="leaves.html">Leaves</a></li>
                                <li><a href="holidays.html">Holidays</a></li>
                                <li><a href="attendance.html">Attendance</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-money"></i> <span> Accounts </span> <span
                                    class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="invoices.html">Invoices</a></li>
                                <li><a href="payments.html">Payments</a></li>
                                <li><a href="expenses.html">Expenses</a></li>
                                <li><a href="taxes.html">Taxes</a></li>
                                <li><a href="provident-fund.html">Provident Fund</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="settings.html"><i class="fa fa-cog"></i> <span>Settings</span></a>
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
