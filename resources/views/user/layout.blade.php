<!-- HEADER -->
{{-- <?php
        // use App\Models\User;
        ?> --}}

<!-- SITE TITTLE -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>EasyPurchase.Com</title>

<!-- FAVICON -->
<link href="{{ asset('user/img/favicon.png') }}" rel="shortcut icon">
<!-- PLUGINS CSS STYLE -->
<!-- <link href="{{ asset('user/plugins/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet"> -->
<!-- Bootstrap -->
<link rel="stylesheet" href="{{ asset('user/plugins/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('user/plugins/bootstrap/css/bootstrap-slider.css') }}">
<!-- Font Awesome -->
<link href="{{ asset('user/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
<!-- Owl Carousel -->
<link href="{{ asset('user/plugins/slick-carousel/slick/slick.css') }}" rel="stylesheet">
<link href="{{ asset('user/plugins/slick-carousel/slick/slick-theme.css') }}" rel="stylesheet">
<!-- Fancy Box -->
<link href="{{ asset('user/plugins/fancybox/jquery.fancybox.pack.css') }}" rel="stylesheet">
<link href="{{ asset('user/plugins/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet">
<!-- CUSTOM CSS -->
<link href="{{ asset('user/css/style.css') }}" rel="stylesheet">
{{-- <link href="{{ asset('admin_assets/css/theme.css') }}" rel="stylesheet"> --}}

<link href="{{ asset('user/css/dropdown.scss') }}" rel="stylesheet" />



<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

  <![endif]-->
{{-- <style>
      .nice-select{
          display: none;
      }
  </style> --}}

<style>
    .d {
        font: bold;
        text-align: center;
    }
    .logo{
        font-size: 30px;
        font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }
</style>

</head>

<body class="body-wrapper">


    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-light navigation">
                        <a class="navbar-brand" href="{{ asset('user/index') }}">
                            <!-- <img src="{{ asset('image/logo.jpg') }}" style="width:150px" alt=""> -->
                            <span class="logo">Easy Purchase.com</span>
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto main-nav ">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ asset('user/index') }}">Home</a>
                                </li>
                                @if (session()->has('FRONT_USER_LOGIN') != null)
                                <li class="nav-item dropdown dropdown-slide">
                                    <a class="nav-link dropdown-toggle" data-toggle="" href="{{ url('user/dashboard/'.session()->get('FRONT_USER_ID')) }}">Dashboard
                                    </a>
                                </li>

                                <li class="nav-item dropdown dropdown-slide">
                                    <a class="nav-link dropdown-toggle" data-toggle="" href="{{ url('user/get_order_list/'.session()->get('FRONT_USER_ID')) }}">MY Order
                                    </a>
                                </li>

                                @else
                                <li class="nav-item dropdown dropdown-slide">
                                    <a class="nav-link dropdown-toggle" data-toggle="" href="{{ url('user/login') }}">Dashboard
                                    </a>
                                </li>
                                @endif
                                <li class="nav-item dropdown dropdown-slide">
                                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Pages <span><i class="fa fa-angle-down"></i></span>
                                    </a>
                                    <!-- Dropdown list -->
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ asset('user/aboutus') }}">About Us</a>
                                        <a class="dropdown-item" href="{{ asset('user/contactus') }}">Contact Us</a>
                                        {{-- <a class="dropdown-item" href="{{ asset('user/userprofile') }}">User
                                        Profile</a> --}}
                                        <!-- <a class="dropdown-item" href="404.html')}}">404 Page</a> -->
                                        <!-- <a class="dropdown-item" href="package.html')}}">Package</a> -->
                                        <!-- <a class="dropdown-item" href="single.html')}}">Single Page</a>
         <a class="dropdown-item" href="store.html')}}">Store Single</a>
         <a class="dropdown-item" href="single-blog.html')}}">Single Post</a> -->
                                        <a class="dropdown-item" href="{{url('user/feedback')}}">Blog</a>
                                    </div>
                                </li>
                               
                            </ul>
                            <ul class="navbar-nav ml-auto mt-10">
                                <div id="login_msg"></div>
                                <li class="nav-item">
                                    @if (session()->has('FRONT_USER_LOGIN') != null)
                                <li class="nav-item dropdown user user-menu">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                        {{ session()->get('FRONT_USER_NAME') }}
                                        {{-- {{Auth::user()->email;}} --}}
                                        {{-- <img src="dist/img/user2-160x160.jpg" class="user-image img-circle elevation-2 alt=" User Image> --}}
                                        {{-- <span class="hidden-xs">{{$id = auth()->user()->name;}}</span> --}}
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                        <!-- User image -->

                                        <!-- Menu Body -->

                                        <!-- Menu Footer-->
                                        <li class="user-footer">
                                            <div class="pull-left">
                                                <?php $uid = session()->get('FRONT_USER_ID')  ?>
                                                <a href="{{ url('user/userprofile/'.$uid) }}" class="btn btn-default btn-flat">Profile</a>
                                            </div>
                                            <div class="pull-right">
                                                <a href="{{ url('/logout') }}" class="btn btn-default btn-flat">Sign
                                                    out</a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>


                                {{-- <li><a class="nav-link login-button" href="{{ url('/logout') }}">Logout</a></li> --}}
                                @else
                                <a class="nav-link login-button" href="{{ asset('user/login') }}">Sign In</a>
                                @endif
                                </li>
                                <li class="nav-item">
                                    @if (session()->has('FRONT_USER_LOGIN') != null)
                                    <a class="nav-link text-white add-button" href="{{ asset('user/ad-listing') }}"><i class="fa fa-plus-circle"></i>
                                        Add
                                        Listing</a>
                                    @else
                                    <a class="nav-link text-white add-button" href="{{ asset('user/login') }}"><i class="fa fa-plus-circle"></i> Add
                                        Listing</a>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </section>




    @yield("content")




    <!--============================
=            Footer            =
=============================-->

    <footer class="footer section section-sm">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-7 offset-md-1 offset-lg-0">
                    <!-- About -->
                    <div class="block about">
                        <!-- footer logo -->
                        <div class="container">
                            <div style="float: justify; text-align: center">
<span class="logo text-light mb-3">Easy Purchase.com</span>
                                <!-- description -->
                                <p class="alt-color">Here you can buy and sell old products at your price, We are always try to make our platform better..!!</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Link list -->
                <div class="col-lg-2 offset-lg-1 col-md-3">
                    <div class="block">
                        <h4>Site Pages</h4>
                        <ul>
                            <li><a href="#">Boston</a></li>
                            <li><a href="#">How It works</a></li>
                            <li><a href="#">Deals & Coupons</a></li>
                            <li><a href="#">Articls & Tips</a></li>
                            <li><a href="#">Terms & Conditions</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Link list -->
                <div class="col-lg-2 col-md-3 offset-md-1 offset-lg-0">
                    <div class="block">
                        <h4>Admin Pages</h4>
                        <ul>
                            <li><a href="#">Category</a></li>
                            <li><a href="#">Single Page</a></li>
                            <li><a href="#">Store Single</a></li>
                           
                        </ul>
                    </div>
                </div>
                <!-- Promotion -->
                <div class="col-lg-4 col-md-7">
                    <!-- App promotion -->
                    <div class="block-2 app-promotion">
                        <div class="mobile d-flex">
                            <a href="#">
                                <!-- Icon -->
                                <img src="{{ asset('user/images/footer/phone-icon.png') }}" alt="mobile-icon">
                            </a>
                            <p>Get the CF Mobile App and Save more</p>
                        </div>
                        <div class="download-btn d-flex my-3">
                            <a href="#"><img src="{{ asset('user/images/apps/google-play-store.png') }}" class="img-fluid" alt=""></a>
                            <a href="#" class=" ml-3"><img src="{{ asset('user/images/apps/apple-app-store.png') }}" class="img-fluid" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container End -->
    </footer>
    <!-- Footer Bottom -->
    <footer class="footer-bottom">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-12">
                    <!-- Copyright -->
                    <div class="copyright">
                        <div class="text-light">
                            <script>
                                var CurrentYear = new Date().getFullYear()
                                document.write(CurrentYear)
                            </script>.All rights reserved. <a class="text-primary" href="#" target="_blank">ClassifiedsFactor.com</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-12">
                    <!-- Social Icons -->
                    <ul class="social-media-icons text-right">
                        <li><a class="fa fa-facebook"  href="#" target="_blank"></a></li>
                        <li><a class="fa fa-twitter" href="#" target="_blank"></a></li>
                        <li><a class="fa fa-pinterest-p"  href="#" target="_blank"></a>
                        </li>
                        <li><a class="fa fa-vimeo" href=""></a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Container End -->
        <!-- To Top -->
        <div class="top-to">
            <a id="top" class="" href="#"><i class="fa fa-angle-up"></i></a>
        </div>
    </footer>

    <!-- JAVASCRIPTS -->
    <script src="{{ asset('user/plugins/jQuery/jquery.min.js') }}"></script>
    {{-- <script src="{{asset('user/plugins/bootstrap/js/popper.min.js')}}"></script> --}}
    <script src="{{ asset('user/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    {{-- <script src="{{ asset('admin_assets/js/main.js') }}"></script> --}}
    <script src="{{ asset('user/plugins/bootstrap/js/bootstrap-slider.js') }}"></script>
    <!-- tether js -->
    <script src="{{ asset('user/plugins/tether/js/tether.min.js') }}"></script>
    <script src="{{ asset('user/plugins/raty/jquery.raty-fa.js') }}"></script>
    <script src="{{ asset('user/plugins/slick-carousel/slick/slick.min.js') }}"></script>
    <!-- <script src="{{ asset('user/plugins/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script> -->
    <script src="{{ asset('user/plugins/fancybox/jquery.fancybox.pack.js') }}"></script>
    <script src="{{ asset('user/plugins/smoothscroll/SmoothScroll.min.js') }}"></script>
    <!-- google map -->
    {{-- <script src="{{asset('user/https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places')}}"></script> --}}
    {{-- <script src="{{asset('user/plugins/google-map/gmap.js')}}"></script> --}}
    <script src="{{ asset('user/js/script.js') }}"></script>



</body>