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
    
    <link rel="stylesheet" href="{{asset('assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/flaticon.css')}}">
    <!-- magnific css -->
    <link rel="stylesheet" href="{{asset('assets/css/magnific.min.css')}}">
    <!-- style css -->
    <link rel="stylesheet" href="{{asset('assets/style.css')}}">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">

    @yield('pageStyles')
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
                                                <li><a href="{{route('/')}}" class="pages" >Home</a>

                                                </li>
                                                <li><a href="{{route('about')}}">About us</a></li>

                                                @if (Auth::check())
                                                     <li><a class="pages" href="{{route('home')}}">Dashboard</a></li>
                                                @else
                                                      <li><a href="{{route('open.accountForm')}}">Open Account</a></li>
                                                @endif
                                               
                                                
                                               
                                                <li><a href="#">contacts</a></li>
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
                                    <li><a href="{{route('about')}}">About us</a></li>
                                        <li><a href="{{route('open.account')}}">Open Account</a></li>
                                    
                                @if (Auth::check())
                                    <li><a class="pages" href="{{route('home')}}">Dashboard</a></li>
                                @else
                                     <li><a href="{{route('open.accountForm')}}">Open Account</a></li>
                                @endif
                                    <li><a href="#">contacts</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

        </div>
   </header>


   <div class="page-area">
        <div class="breadcumb-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h3>@yield('dashboard-header')</h3>
                   
                </div>
            </div>
        </div>
    </div>

    <div class="dsahboard-area bg-color area-padding">
        
        <div class="container">
            <div class="row">
               
                <div class="col-md-12 col-sm-12 col-xs-12">
                    {{-- <div class="s-menu" style="margin-top:-3.5px; width:80%; margin-bottom:10px; margin-left:10%;">
                        <a href="#">Click to confirm email</a>
                    </div> --}}
                    <div class="dashboard-head">
                         
                        <div class="row">
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="single-dash-head">
                                    <div class="dashboard-profile">
                                        <div class="profile-content">
                                            <div class="amount-content">
                                                <a class="edit-icon" href="{{route('upload.imageform')}}"><i
                                                    class="ti-pencil-alt"></i></a>
                                                <img src="{{asset("userImage/".Auth::user()->image)}}" alt="" style="width:90px; heigth:80px;">
                                                <span class="pro-name">{{Auth::user()->is_verified==1 ? "Good to have you back":"Welcome"}} {{Auth::user()->first_name}}</span>
                                            </div>
                                             
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="single-dash-head">
                                    <div class="dashboard-amount">
                                        <div class="amount-content">
                                            <i class="flaticon-028-money"></i>
                                            <span class="pro-name">Balance: ${{$ac_balance}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="single-dash-head">
                                    <div class="dashboard-amount">
                                        <div class="amount-content">
                                            <a class="edit-icon" href="{{route('account.details')}}"><i style="font-size: 25px"
                                                    class="ti-eye"></i></a>
                                            <i class="flaticon-043-bank-2"></i>
                                            <span class="pro-name">Account Details</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="single-dash-head">
                                    <div class="dashboard-amount">
                                        <div class="amount-content">
                                            <a class="edit-icon" href="{{route('profile')}}"><i
                                                    class="ti-pencil-alt"></i></a>
                                            <i class="flaticon-050-user_profile"></i>
                                            <span class="pro-name">Profile</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>


            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <aside class="sidebar">
                        <div class="dashboard-side">
                            <ul>
                                <li class="{{Request::segment(1)=="home" ? "active":"" }} "><a href="{{route('home')}}"><i class="ti-dashboard"></i>Dashboard</a></li>
                                <li  class="{{Request::segment(1)=="send-money" ? "active":"" }} "><a href="{{route('send.moneyForm')}}"><i class="ti-credit-card"></i>Send Money</a></li>
                                <li class="{{Request::segment(1)=="make-request" ? "active":"" }} "><a href="{{route('request.form')}}"><i class="ti-receipt"></i>Make Request</a></li>
                                <li class="{{Request::segment(1)=="account-details" ? "active":"" }} "><a href="{{route('account.details')}}"><i class="ti-eye"></i>Account Details</a></li>
                                 <li class="{{Request::segment(1)=="transactions" ? "active":"" }} "><a href="{{route('transaction.logs')}}"><i class="ti-layout-list-thumb"></i>Transactions Log</a></li>
                                <li class="{{Request::segment(1)=="settings" ? "active":"" }} "><a href="{{route('settings')}}"><i class="ti-settings"></i>Settings</a></li>
                            </ul>
                           

                        </div>
                         <div class="dashboard-support">
                            <div class="support-inner">
                                <div class="help-support">
                                    <i class="flaticon-107-speech-bubbles"></i>
                                    <a href="#" onclick="Tawk_API.toggle()"><span class="help-text">Need Help?</span></a>
                                </div>
                            </div>
                        </div>
                         
                    </aside>

                </div>

                @yield('content-body')

            </div>

        </div>
    </div>

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

     <script src="{{asset('/assets/utility.js?version=1')}}"></script>
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
     @yield('scripts')
   
  {{-- {{ TawkTo::widgetCode('2327cd3345f43703a35f6f397f5c9f5c66dd8cc5') }} --}}
</body>

</html>

