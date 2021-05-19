<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <title>Campus</title>
    <meta name="description" content="Campus">
    <meta name="tags" content="">
    <meta name="author" content="Jeff Simons Decena">
    @if(App::isLocale('en'))
    <link rel="icon" type="image/png" sizes="56x56" href="{{ asset('images/fav-icon/icon.png') }}">
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}">
    @else
    <link rel="icon" type="image/png" sizes="56x56" href="{{ asset('images/fav-icon/icon.png') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}">
    @endif
    <link rel="icon" type="image/png" sizes="56x56" href="{{ asset('images/fav-icon/icon.png') }}">
    @yield('css')
    <meta property="og:url" content="{{ request()->url() }}"/>
    @yield('og')
</head>
<body>

<section>
    <!-- ===================================================
    Loading Transition
    ==================================================== -->
    <div id="loader-wrapper">
        <div id="loader"></div>
    </div>
    <!--
    =============================================
        Theme Header
    ==============================================
    -->
    <header class="theme-menu-wrapper menu-style-one">
        <div class="container-fluid">
            <div class="header-wrapper clearfix">
                <!-- Logo -->
                <div class="logo float-left tran4s"><a href="index.html"><img src="images/logo/logo3.png" alt="Logo"></a></div>

                <!-- ============================ Theme Menu ========================= -->
                <nav class="theme-main-menu float-right navbar" id="mega-menu-wrapper">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navbar-collapse-1">
                        <ul class="nav">
                            <li class="menu-list"><a href="{{ route ('Campus') }}" class="tran3s">@lang('front.Home')</a>
                            </li>
                            <li class="menu-list"><a href="{{ route ('course') }}" class="tran3s">@lang('front.Course')</a>
                            </li>
                            <li class="menu-list"><a href="{{ route ('partners') }}" class="tran3s">@lang('front.Organizers')</a>
                            </li>
                            <li><a href="{{ route ('contact') }}" class="tran3s">@lang('front.Contact Us')</a></li>
                            @auth
                            <li class="dropdown-holder menu-list"><a  class="tran3s"><i class="flaticon-user"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="{{ auth()->user()->hasRole('admin') ? url('/admin') : url('/dashbord') }}">account</a></li>
                                    <li><a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">@lang('auth.sign_out')</a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form></li>
                                </ul>
                            <i class="icon flaticon-down-arrow"></i></li>
                            @else
                            <li class="login"><a class="tran3s" data-toggle="modal" data-target=".signInModal"><i class="flaticon-lock"></i></a></li>
                            @endauth
                            <li class="login"><a href="" class="tran3s">EN</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </nav> <!-- /.theme-main-menu -->
            </div> <!-- /.header-wrapper -->
        </div>
    </header> <!-- /.theme-menu-wrapper -->

</section>

<div class="container-fluid">
    @yield('content')
</div>

<!-- Sign-in Modal -->
<div class="modal fade signInModal theme-modal-box"  id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <form method="post" action="{{ url('/login') }}">
                    @csrf
                    <h3>Login with Site Account</h3>
                    <div class="wrapper">
                        <input id="email" placeholder="@lang('auth.email')" type="email" class="form-control {{ $errors->has('email')?'is-invalid':'' }}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        <input id="password" placeholder="@lang('auth.password')" type="password" class="form-control {{ $errors->has('password')?'is-invalid':'' }}" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <ul class="clearfix">
                            <li class="float-left">
                                <input type="checkbox" id="remember">
                                <label for="remember">Remember Me</label>
                            </li>
                            <li class="float-right"><a href="{{ url('/password/reset') }}" class="s-color">Lost Your Password?</a></li>
                        </ul>
                        <button class="p-bg-color hvr-trim" type="submit">@lang('auth.sign_in')</button>
                    </div>
                </form>
                <div><a href="{{ route ('registeruser') }}" class="p-color tran3s">Not an account?? Sign Up</a></div>
            </div> <!-- /.modal-body -->
        </div> <!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div> <!-- /.signInModal -->

 <!-- Scroll Top Button -->
<button class="scroll-top tran3s">
    <i class="fa fa-angle-up" aria-hidden="true"></i>
</button>


<script type="text/javascript" src="{{ asset('vendor/jquery.2.2.3.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/bootstrap-select/dist/js/bootstrap-select.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/bootstrap/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/Camera-master/scripts/jquery.mobile.customized.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/Camera-master/scripts/jquery.easing.1.3.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/Camera-master/scripts/camera.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/bootstrap-mega-menu/js/menu.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/WOW-master/dist/wow.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/owl-carousel/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/Counter/jquery.counterup.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/Counter/jquery.waypoints.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/jquery-ui/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/jquery.mixitup.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/theme.js') }}"></script>
@if($errors->has('email') || $errors->has('password'))
    <script>
    $(function() {
        $('#loginModal').modal({
            show: true
        });
    });
    </script>
@endif
@yield('js')
@section('scripts')
@parent

@if($errors->has('email') || $errors->has('password'))
    <script>
    $(function() {
        $('#loginModal').modal({
            show: true
        });
    });
    </script>
@endif
@endsection
</body>
</html>
