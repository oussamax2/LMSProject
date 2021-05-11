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
  
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('assets-panel/css/coreui-icons-free.css')}}">
    <link href="{{ asset('fonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets-panel/css/simple-line-icons.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets-panel/css/flag-icon.min.css')}}">
</head>
<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
<header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">
        <img class="navbar-brand-full" src="https://assets.infyom.com/logo/blue_logo_150x150.png" width="30" height="30"
             alt="InfyOm Logo">
        <img class="navbar-brand-minimized" src="https://assets.infyom.com/logo/blue_logo_150x150.png" width="30"
             height="30" alt="InfyOm Logo">
    </a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
    </button>

    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item d-md-down-none">
            <a class="nav-link" href="#">
                <i class="icon-bell"></i>
                <span class="badge badge-pill badge-danger">5</span>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" style="margin-right: 10px" data-toggle="dropdown" href="#" role="button"
               aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header text-center">
                    <strong>Account</strong>
                </div>
                <a class="dropdown-item" href="#">
                    <i class="fa fa-envelope-o"></i> @lang('auth.app.messages')
                    <span class="badge badge-success">42</span>
                </a>
                <div class="dropdown-header text-center">
                    <strong>@lang('auth.app.settings')</strong>
                </div>
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
<footer class="app-footer">
    <div>
        <a href="https://infyom.com">InfyOm </a>
        <span>&copy; 2021 InfyOmLabs.</span>
    </div>
  
</footer>
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
