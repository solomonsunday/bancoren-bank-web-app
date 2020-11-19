<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Coventry Metro Credit Union</title>
     <meta name="csrf-token" content="{{@csrf_token()}}" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/logo/favicon.ico">

    <!-- all css here -->

    <!-- bootstrap v3.3.6 css -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.transitions.css')}}">
    <!-- Animate css -->
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
    <!-- Nice-select css -->
    <link rel="stylesheet" href="{{asset('assets/css/nice-select.css')}}">
    <!-- meanmenu css -->
    <link rel="stylesheet" href="{{asset('assets/css/meanmenu.min.css')}}">
    <!-- font-awesome css -->
    {{-- <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    {{-- 
    <link rel="stylesheet" href="{{asset('assets/fonts/fontawesome-webfont.ttf_v=4.5.0')}}">
    <link rel="stylesheet" href="{{asset('assets/fonts/fontawesome-webfont.woff_v=4.5.0')}}">
    <link rel="stylesheet" href="{{asset('assets/fonts/fontawesome-webfont.woff2_v=4.5.0')}}"> --}}
    <link rel="stylesheet" href="{{asset('assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/flaticon.css')}}">
    <!-- magnific css -->
    <link rel="stylesheet" href="{{asset('assets/css/magnific.min.css')}}">
    <!-- style css -->
    <link rel="stylesheet" href="{{asset('assets/style.css')}}">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">

    <!-- modernizr css -->
    <script src="{{asset('assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>

<body>
   <div id="preloader"></div>
   <header class="header-one">

        <div class="topbar-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="topbar-left">
                            <ul>
                               <li><a href="#"><i class="fa fa-envelope"></i> info@bultifor.com</a></li>
                                <li><a href="#"><i class="fa fa-clock-o"></i> Live support</a></li>
                            </ul>

                        </div>

                    </div>

                     <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="topbar-right">
                            <ul>
                                {{-- <li><a href="#"><img src="img/icon/w1.png" alt="">ENG</a>
                                    <ul>
                                        <li><a href="#"><img src="{{asset('assets/img/icon/w2.png')}}" alt="">DEU</a>
                                        <li><a href="#"><img src="{{asset('assets/img/icon/w3.png')}}" alt="">ESP</a>
                                        <li><a href="#"><img src="{{asset('assets/img/icon/w4.png')}}" alt="">FRA</a>
                                        <li><a href="#"><img src="{{asset('assets/img/icon/w5.png')}}" alt="">KSA</a>
                                    </ul>
                                </li> --}}
                                @if (Auth::check())
                                     <li><a href="{{route('logout')}}"><img src="" alt="">Logout</a>
                                @else

                                <li><a href="{{route('login')}}"><img src="{{asset('assets/img/icon/login.png')}}" alt="">Login</a>
                                @endif
                                
                            </ul>
                        </div>
                    </div>



                </div>

            </div>

        </div>


        <div id="sticker" class="header-area hidden-xs">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="row">
                             <div class="col-md-3 col-sm-3">
                                <div class="logo">
                                    <!-- Brand -->
                                    <a class="navbar-brand page-scroll" href="{{route('/')}}">
                                        <img src="{{asset('assets/img/logo/logo2.png')}}" alt="">
                                    </a>
                                </div>
                                <!-- logo end -->
                            </div>
                                          <div class="col-md-9 col-sm-9">
                                <div class="header-right-link">
                                    <!-- search option end -->
                                    @if (Auth::check())
                                        <a class="s-menu" href="{{route('logout')}}">Logout</a>
                                    @else
                                         <a class="s-menu" href="{{route('login')}}">Login</a>
                                    @endif
                                   
                                </div>
                                <!-- mainmenu start -->
                                <nav class="navbar navbar-default">
                                    <div class="collapse navbar-collapse" id="navbar-example">
                                        <div class="main-menu">
                                            <ul class="nav navbar-nav navbar-right">
                                                <li><a href="{{route('/')}}" class="pages" href="index.html">Home</a>

                                                </li>
                                                <li><a href="about.html">About us</a></li>

                                                @if (Auth::check())
                                                     <li><a class="pages" href="{{route('home')}}">Dashboard</a></li>
                                                @else
                                                      <li><a href="{{route('open.accountForm')}}">Open Account</a></li>
                                                @endif
                                               
                                                
                                               
                                                <li><a href="contact.html">contacts</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </nav>
                                <!-- mainmenu end -->
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>



        <div class="mobile-menu-area hidden-lg hidden-md hidden-sm">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mobile-menu">
                            <div class="logo">
                                <a href=""><img src="{{asset('assets/img/logo/logo2.png')}}" alt="" /></a>
                            </div>
                            <nav id="dropdown">
                                 <ul>
                                    <li><a href="{{route('/')}}" class="pages">Home</a>

                                    </li>
                                    <li><a href="about.html">About us</a></li>
                                        <li><a href="about.html">Open Account</a></li>
                                    
                                    <li><a class="pages" href="#">Dashboard</a></li>
                                    <li><a href="contact.html">contacts</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

        </div>
   </header>


  @yield('content-body')
{{-- Begin footer --}}
<footer class="footer-1">
        <div class="footer-area">
            <div class="container">
                <div class="row">
                    <!-- Start column-->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="footer-content logo-footer">
                            <div class="footer-head">
                                <div class="footer-logo">
                                    <a class="footer-black-logo" href="#"><img src="{{asset('assets/img/logo/logo2.png')}}" alt=""></a>
                                </div>
                                <p>
                                    Replacing a maintains the amount of lines. When replacing a selection. help agencies
                                    to define their new business objectives and then create. Replacing a maintains the
                                    amount of lines.
                                </p>
                                <div class="subs-feilds">
                                    <div class="suscribe-input">
                                        <input type="email" class="email form-control width-80" id="sus_email"
                                            placeholder="Type Email">
                                        <button type="submit" id="sus_submit" class="add-btn">Subscribe</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End column-->
                    <!-- Start column-->
                    <div class="col-md-2 col-sm-3 col-xs-12">
                        <div class="footer-content">
                            <div class="footer-head">
                                <h4>Products</h4>
                                <ul class="footer-list">
                                    <li><a href="#">Bank Card</a></li>
                                    <li><a href="#">Deposit Skim</a></li>
                                    <li><a href="#">Affiliate</a></li>
                                    <li><a href="#">Software</a></li>
                                    <li><a href="#">Branding </a></li>
                                    <li><a href="#">Promotion </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End column-->
                    <!-- Start column-->
                    <div class="col-md-2 col-sm-3 col-xs-12">
                        <div class="footer-content">
                            <div class="footer-head">
                                <h4>Payments</h4>
                                <ul class="footer-list">
                                    <li><a href="#">Send Mony</a></li>
                                    <li><a href="#">Receive Money </a></li>
                                    <li><a href="#">Shopping</a></li>
                                    <li><a href="#">Online payment</a></li>
                                    <li><a href="#">pay a Friend </a></li>
                                    <li><a href="#">pay a bill </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End column-->
                    <!-- Start column-->
                    <div class="col-md-2 hidden-sm col-xs-12">
                        <div class="footer-content">
                            <div class="footer-head">
                                <h4>Company</h4>
                                <ul class="footer-list">
                                    <li><a href="#">About us</a></li>
                                    <li><a href="#">Services </a></li>
                                    <li><a href="#">Events</a></li>
                                    <li><a href="#">Promotion</a></li>
                                    <li><a href="#">Transition</a></li>
                                    <li><a href="#">Social Media</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End column-->
                    <!-- Start column-->
                    <div class="col-md-2 hidden-sm col-xs-12">
                        <div class="footer-content last-content">
                            <div class="footer-head">
                                <h4>Support</h4>
                                <ul class="footer-list">
                                    <li><a href="#">Customer Care</a></li>
                                    <li><a href="#">Live chat</a></li>
                                    <li><a href="#">Notification</a></li>
                                    <li><a href="#">Privacy</a></li>
                                    <li><a href="#">Terms & Condition</a></li>
                                    <li><a href="#">Contact us </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End column-->
                </div>
            </div>
        </div>
        <!-- Start footer bottom area -->
        <div class="footer-area-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="copyright">
                            <p>
                                Copyright © {{date("Y")}}
                                <a href="#">Covmetrocu</a> All Rights Reserved
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End footer bottom area -->
    </footer>

    {{-- End Footer --}}

    <!-- jquery latest version -->
    <script src="{{asset('assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <!-- bootstrap js -->
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <!-- owl.carousel js -->
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <!-- stellar js -->
    <script src="{{asset('assets/js/jquery.stellar.min.js')}}"></script>
    <!-- magnific js -->
    <script src="{{asset('assets/js/magnific.min.js')}}"></script>
    <!-- Nice-select js -->
    <script src="{{asset('assets/js/jquery.nice-select.min.js')}}"></script>
    <!-- wow js -->
    <script src="{{asset('assets/js/wow.min.js')}}"></script>
    <!-- meanmenu js -->
    <script src="{{asset('assets/js/jquery.meanmenu.js')}}"></script>
    <!-- Form validator js -->
    <script src="{{asset('assets/js/form-validator.min.js')}}"></script>
    <!-- plugins js -->
    <script src="{{asset('assets/js/plugins.js')}}"></script>
    <!-- main js -->
     <script src="{{asset('assets/js/main.js')}}"></script>

     <script src="{{mix('/assets/pages/utility.js')}}"></script>

    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/5fac683a8e1c140c2abd4983/default';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
</body>

</html>

