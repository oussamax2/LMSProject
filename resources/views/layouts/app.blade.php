<!DOCTYPE html>
@if (App::isLocale('ar'))
<html dir="rtl" lang="ar">
@else
<html lang="{{ app()->getLocale() }}">
@endif
<head>
    <meta charset="UTF-8">
    <title>{{config('app.name')}}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    @if(App::isLocale('en'))
    <!-- Bootstrap 4.1.1 -->
    <link rel="stylesheet" href="{{ asset('assets-panel/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets-panel/css/bootstrap-datetimepicker.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets-panel/css/coreui.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets-panel/css/admin.css')}}">
    <link rel="stylesheet" href="{{ asset('assets-panel/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('fonts/icon/font/flaticon.css') }}">
    @toastr_css
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('assets-panel/css/coreui-icons-free.css')}}">
    <link href="{{ asset('fonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets-panel/css/simple-line-icons.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets-panel/css/flag-icon.min.css')}}">
    @else
    <!-- Bootstrap 4.1.1 -->
    <link rel="stylesheet" href="{{ asset('assets-panel/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets-panel/css/bootstrap-datetimepicker.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets-panel/css/coreui.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets-panel/fonts/ExpoArabic-Book.ttf') }}">
    <link rel="stylesheet" href="{{ asset('assets-panel/css/adminrtl.css')}}">
    <link rel="stylesheet" href="{{ asset('assets-panel/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('fonts/icon/font/flaticon.css') }}">
    @toastr_css
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('assets-panel/css/coreui-icons-free.css')}}">
    <link href="{{ asset('fonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets-panel/css/simple-line-icons.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets-panel/css/flag-icon.min.css')}}">
    @endif
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
        <li class="menu-list"><a href="{{ route ('Campus') }}" class="tran3s">@lang('front.Home')</a></li>
        <li class="menu-list"><a href="{{ route ('course') }}" class="tran3s">@lang('front.Course')</a></li>
        <li class="menu-list"><a href="{{ route ('partners') }}" class="tran3s">@lang('front.Organizers')</a></li>
        <li class="menu-list"><a href="{{ route ('contact') }}" class="tran3s">@lang('front.Contact Us')</a></li>
        <li class="nav-item dropdown">
            <a class="nameuserlms nav-link" href="#" class="tran3s" data-toggle="dropdown" href="#" role="button"
               aria-haspopup="true" aria-expanded="false">
               <i class="icon flaticon-down-arrow"></i>
                {{ Config::get('languages')[App::getLocale()] }}
            </a>
            <div class="dropdown-menu dropdown-menu-right">
            @foreach (Config::get('languages') as $lang => $language)
                @if ($lang != App::getLocale())
                        <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}"> {{$language}}</a>
                @endif
            @endforeach
            </div>
        </li>
        <!-- menu list -->

        <li class="nav-item d-md-down-none">
            <a class="nav-link" href="{{ route('registerationsuser.index') }}">
                <i class="icon-bell"></i>
                <span class="badge badge-pill badge-danger">{{auth()->user()->notif()}}</span>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nameuserlms nav-link" data-toggle="dropdown" href="#" role="button"
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
                    <i class="fa fa-user"></i> @lang('front.profile')</a>

                <a class="dropdown-item" href="{{ url('/logout') }}" class="btn btn-default btn-flat"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-lock"></i>@lang('front.sign_out')
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
                <div class="col-md-12">
                    <div class="footer-logo pull-left">
                        <a href="index.html"><img src="{{ asset('images/logo/logo2.png')}}" alt="Logo"></a>
                    </div>
                    <div class="footer-logo pull-right">
                        <p class="float-left">&copy; @lang('front.2021 All rights reserved')</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<!-- footer -->
</body>
<!-- jQuery 3.1.1 -->
<script src="{{ asset('assets-panel/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{ asset('assets-panel/js/select2.min.js')}}"></script>
<script src="{{ asset('assets-panel/js/popper.min.js')}}"></script>
<script src="{{ asset('assets-panel/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('assets-panel/js/moment.min.js')}}"></script>
<script src="{{ asset('assets-panel/js/bootstrap-datetimepicker.min.js')}}"></script>
<script src="{{ asset('assets-panel/js/coreui.min.js')}}"></script>
@stack('scripts')
@toastr_js
@toastr_render
</html>
