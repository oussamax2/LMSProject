<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>{{config('app.name')}}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 4.1.1 -->
    <link rel="stylesheet" href="{{ asset('assets-panel/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets-panel/css/bootstrap-datetimepicker.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets-panel/css/coreui.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets-panel/css/admin.css')}}">
    <link rel="stylesheet" href="{{ asset('fonts/icon/font/flaticon.css') }}">

    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('assets-panel/css/coreui-icons-free.css')}}">
    <link href="{{ asset('fonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets-panel/css/simple-line-icons.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets-panel/css/flag-icon.min.css')}}">
</head>
<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
<header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="icon-menu"></span>
    </button>
    <a class="navbar-brand" href="#">
        <img class="navbar-brand-full" src="{{ asset('images/logo/logo3.png')}}" width="30" height="30"
             alt="InfyOm Logo">
        <img class="navbar-brand-minimized" src="{{ asset('images/logo/logo3.png')}}" width="30"
             height="30" alt="InfyOm Logo">
    </a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="icon-menu"></span>
    </button>


    <ul class="nav navbar-nav ml-auto">
        <!-- menu list -->
        <li class="menu-list"><a href="{{ route ('Campus') }}" class="tran3s">Home</a></li>
        <li class="menu-list"><a href="{{ route ('course') }}" class="tran3s">Course</a></li>
        <li class="menu-list"><a href="{{ route ('partners') }}" class="tran3s">Organizers</a></li>
        <li class="menu-list"><a href="{{ route ('contact') }}" class="tran3s">Contact Us</a></li>
        <!-- menu list -->

        <li class="nav-item d-md-down-none">
            <a class="nav-link" href="#">
                <i class="icon-bell"></i>
                <span class="badge badge-pill badge-danger">5</span>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nameuserlms nav-link" style="margin-right: 10px" data-toggle="dropdown" href="#" role="button"
               aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu dropdown-menu-right">
               {{-- <div class="dropdown-header text-center">
                    <strong>Account</strong>
                </div>
                <a class="dropdown-item" href="#">
                    <i class="fa fa-envelope-o"></i> @lang('auth.app.messages')
                    <span class="badge badge-success">42</span>
                </a>
                <div class="dropdown-header text-center">
                    <strong>@lang('auth.app.settings')</strong>
                </div> --}}
                <a class="dropdown-item" href="{{ route('user-profile.edit') }}">
                    <i class="fa fa-user"></i> @lang('auth.app.profile')</a>
                <a class="dropdown-item" href="#">
                    <i class="fa fa-wrench"></i> @lang('auth.app.settings')</a>
                <a class="dropdown-item" href="{{ url('/logout') }}" class="btn btn-default btn-flat"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-lock"></i>@lang('auth.sign_out')
                </a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</header>

<div class="app-body">
    @include('layouts.sidebar')
    <main class="main">
        @yield('content')
    </main>
</div>
<!-- footer -->
    <footer class="app-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="footer-logo">
                        <a href="index.html"><img src="{{ asset('images/logo/logo2.png')}}" alt="Logo"></a>
                        <p>It was some time before he obtained any answer, and the reply, when made, was unpropitious.</p>
                        <ul>
                            <li><a href="" class="tran3s"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="" class="tran3s"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="" class="tran3s"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                            <li><a href="" class="tran3s"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-3 footer-list">
                    <h6>Company</h6>
                    <ul class="info-company-lms">
                        <li><a href="{{ route ('Campus') }}" class="tran3s">Home</a></li>
                        <li><a href="{{ route ('course') }}" class="tran3s">Course</a></li>
                        <li><a href="{{ route ('partners') }}" class="tran3s">Organizers</a></li>
                        <li><a href="{{ route ('contact') }}" class="tran3s">Contact us</a></li>
                    </ul>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12 footer-subscribe">
                    <h6>Subscribe Us</h6>
                    <p>This sounded a very good reason, and Alice was quite pleased.</p>
                    <form action="#">
                        <input type="text" placeholder="Your Email">
                        <button class="tran3s s-bg-color"><i class="flaticon-envelope-back-view-outline"></i></button>
                    </form>
                </div>
            </div>
        </div>

        <div class="bottom-footer">
            <div class="container">
                <ul class="float-right">
                    <li><h3><span class="counter p-color">8,997</span> Courses</h3></li>
                    <li><h3><span class="counter p-color">53,701</span> sessions</h3></li>
                    <li><h3><span class="counter p-color">1,119</span> company</h3></li>
                </ul>
                <p class="float-left">&copy; 2021 All rights reserved</p>
            </div>
        </div>
    </footer>
<!-- footer -->
</body>
<!-- jQuery 3.1.1 -->
<script src="{{ asset('assets-panel/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{ asset('assets-panel/js/popper.min.js')}}"></script>
<script src="{{ asset('assets-panel/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('assets-panel/js/moment.min.js')}}"></script>
<script src="{{ asset('assets-panel/js/bootstrap-datetimepicker.min.js')}}"></script>
<script src="{{ asset('assets-panel/js/coreui.min.js')}}"></script>
@stack('scripts')

</html>
