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
                            <li class="dropdown-holder menu-list"><a href="index.html" class="tran3s">Home</a>
                                <ul class="sub-menu">
                                    <li><a href="index.html">Home version one</a></li>
                                    <li><a href="index-2.html">Home version Two</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-holder menu-list"><a href="#" class="tran3s">Course</a>
                                <ul class="sub-menu">
                                    <li><a href="course-grid.html">Course grid</a></li>
                                    <li><a href="course-list.html">Course List</a></li>
                                    <li><a href="course-details.html">Course Details</a></li>
                                    <li class="dropdown-holder"><a href="#">Third Level menu</a>
                                        <ul class="second-sub-menu">
                                            <li><a href="#">menu one</a></li>
                                            <li><a href="#">menu two</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown-holder menu-list"><a href="#" class="tran3s">Pages</a>
                                <ul class="sub-menu width-half">
                                    <li><a href="about-us.html">About Us</a></li>
                                    <li><a href="our-teacher.html">Our teacher</a></li>
                                    <li><a href="teachers-profile.html">teachers profile</a></li>
                                    <li><a href="shop.html">Shop page</a></li>
                                    <li><a href="shop-details.html">Shop Details</a></li>
                                    <li><a href="portfolio-3-column.html">portfolio 3 column</a></li>
                                    <li><a href="portfolio-4-column.html">portfolio 4 column</a></li>
                                    <li><a href="pricing-plan.html">Pricing Plan</a></li>
                                    <li><a href="faq.html">Faq Page</a></li>
                                    <li><a href="404.html">Error Page</a></li>
                                    <li><a href="sign-up.html">Registration</a></li>
                                    <li class="dropdown-holder"><a href="#">Third Level menu</a>
                                        <ul class="second-sub-menu">
                                            <li><a href="#">menu one</a></li>
                                            <li><a href="#">menu two</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown-holder menu-list"><a href="#" class="tran3s">Event</a>
                                <ul class="sub-menu">
                                    <li><a href="event-list.html">Event List</a></li>
                                    <li><a href="event-grid.html">Event Grid</a></li>
                                    <li><a href="event-details.html">Event Single</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-holder menu-list"><a href="#" class="tran3s">Blog</a>
                                <ul class="sub-menu">
                                    <li><a href="blog-grid.html">Blog grid</a></li>
                                    <li><a href="blog-list.html">Blog List</a></li>
                                    <li><a href="blog-details.html">blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="contact-us.html" class="tran3s">Contact Us</a></li>
                            <li class="login"><a class="tran3s" data-toggle="modal" data-target=".signInModal"><i class="flaticon-lock"></i></a></li>
                            <li class="login"><a class="tran3s"><i class="flaticon-online-shopping-cart"></i></a></li>
                            <li class="login"><a class="tran3s"><i class="flaticon-search"></i></a></li>
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
<div class="modal fade signInModal theme-modal-box" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <form action="#">
                    <h3>Login with Site Account</h3>
                    <div class="wrapper">
                        <input type="text" placeholder="Username or Email">
                        <input type="password" placeholder="Password">
                        <ul class="clearfix">
                            <li class="float-left">
                                <input type="checkbox" id="remember">
                                <label for="remember">Remember Me</label>
                            </li>
                            <li class="float-right"><a href="#" class="s-color">Lost Your Password?</a></li>
                        </ul>
                        <button class="p-bg-color hvr-trim">Login</button>
                    </div>
                </form>
                <div><a href="sign-up.html" class="p-color tran3s">Not an account?? Sign Up</a></div>
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
@yield('js')
</body>
</html>