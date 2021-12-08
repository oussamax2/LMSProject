<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    @yield('og')
    @if(App::isLocale('en'))
    <link rel="icon" type="image/png" sizes="56x56" href="{{ asset('images/fav-icon/icon.png') }}">
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}">
    <link href="{{ asset('assets-panel/css/simple-line-icons.css')}}" rel="stylesheet">
    @else
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/bootstrap-rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styleRTL.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome-rtl.css') }}">
    <link rel="icon" type="image/png" sizes="56x56" href="{{ asset('images/fav-icon/icon.png') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/responsiveRTL.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/ExpoArabic-Book.ttf') }}">
    @endif
    <link rel="icon" type="image/png" sizes="56x56" href="{{ asset('images/fav-icon/icon.png') }}">
    @yield('css')
    @toastr_css
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-NCK4DHHZV2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-NCK4DHHZV2');
</script>
</head>
<body>

<section>
    {{-- Loading Transition --}}
    <div id="loader-wrapper">
        <div id="loader"></div>
    </div>
    {{-- Theme Header --}}
    <header class="theme-menu-wrapper menu-style-one">
        <div class="container-fluid">
            <div class="header-wrapper clearfix">
                {{-- Logo --}}
                <div class="logo float-left tran4s"><a href="{{ route ('home') }}"><img src="{{ asset('images/logo/logo3.png') }}" alt="Logo"></a></div>

                {{-- Theme Menu --}}
                <nav class="theme-main-menu float-right navbar" id="mega-menu-wrapper">
                    {{-- Brand and toggle get grouped for better mobile display --}}
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                    </div>
                    {{-- Collect the nav links, forms, and other content for toggling --}}
                    <div class="collapse navbar-collapse" id="navbar-collapse-1">
                        <ul class="nav">
                            <li class="menu-list"><a href="{{ route ('home') }}" class="tran3s">@lang('front.Home')</a>
                            </li>
                            <li class="menu-list"><a href="{{ route ('course') }}" class="tran3s">@lang('front.Course')</a>
                            </li>
                            <li class="menu-list"><a href="{{ route ('partners') }}" class="tran3s">@lang('front.Organizers')</a>
                            </li>
                            <li><a href="{{ route ('contact') }}" class="tran3s">@lang('front.Contact Us')</a></li>
                            @auth
                            <li class="dropdown-holder menu-list"><a class="tran3s"><i class="flaticon-user"></i> {{ Auth::user()->name }}</a>
                                <ul class="sub-menu">
                                    <li><a href="
                                        @if(auth()->user()->hasRole('admin'))
                                        {{url('/admin')}}
                                        @elseif (auth()->user()->hasRole('company'))
                                        {{url('/dashboard')}}
                                        @else
                                        {{url('/dashboarduser')}}
                                        @endif
                                        ">@lang('front.Account')</a></li>
                                    <li><a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">@lang('auth.sign_out')</a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form></li>
                                </ul>
                            <i class="icon flaticon-down-arrow"></i></li>
                            @else
                            <li class="login"><a class="tran3s" data-toggle="modal" data-target=".signInModal"><i class="flaticon-lock"></i></a></li>
                            @endauth
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>

</section>

<div class="container-fluid">
    @yield('content')
</div>

{{-- Sign-in Modal --}}
<div class="modal fade signInModal theme-modal-box"  id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
    <div class="modal-dialog">
        {{-- Modal content --}}
        <div class="modal-content">
            <div class="modal-body">
            @if(!isset($exception) || ($exception->getStatusCode() == 404))
            @livewireStyles
            @livewire('login')
            @livewireScripts
            @endif
                <div><a href="{{ route ('registeruser') }}" class="p-color tran3s">@lang('auth.Do not have account? Sign up')</a></div>
            </div>
        </div>
    </div>
</div>


 {{-- Scroll Top Button --}}
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
@if (0)
<script>
$(document).ready(function(){
sendRequest();
function sendRequest(){
    $.ajax({
      url: "{{ url('/') }}",
      success:
        function(data){
      },

      complete: function() {
     setInterval(sendRequest, 180000); // The interval set to 3 min
   }
  });
};
});
</script>
@endif
@yield('js')
@section('scripts')
@parent
@endsection
@toastr_js
@toastr_render
</body>

</html>
