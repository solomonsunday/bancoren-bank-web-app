<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
     <meta name="csrf-token" content="{{@csrf_token()}}" />
    <title>Login - Coventry Metro Credit Union</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/logo/favicon.ico')}}">

    <!-- all css here -->

    <!-- bootstrap v3.3.6 css -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- font-icon css -->
    <link rel="stylesheet" href="{{asset('assets/css/themify-icons.css')}}">
    <!-- style css -->
    <link rel="stylesheet" href="{{asset('assets/style.css')}}">

     <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">

    <!-- modernizr css -->
    <script src="{{asset('assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>

   
</head>

<body data-spy="scroll" data-target="#navbar-example">
   
    <div class="login-area area-padding fix">

        <div id="full-loader" class="loader-demo-box d-none">
             <div class="circle-loader"></div>
        </div>
        <div class="login-overlay"></div>
         
        <div class="table">
             
            <div class="table-cell">
               
                <div class="container">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8 col-xs-12">
                            <div class="login-form">
                                <h4 class="login-title text-center">LOGIN</h4>
                                <div class="alert" id="errorMsg" style="display:none;"></div>
                                <div class="row">
                                    <form id="login-form" method="POST" action="{{route('login')}}" class="log-form">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input type="text" id="email" class="form-control" placeholder="Enter your Email"
                                                required data-error="Please enter your name">
                                                    <span id="email-error-msg" class="error mt-1 text-danger"></span>
                                                  {{-- <label id="email-error-msg" class="error mt-1 text-danger" for="password"></label> --}}
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input type="password" id="password" class="form-control"
                                                placeholder="Password" required
                                                data-error="Please enter your message subject">
                                                   <span id="password-error-msg" class="error mt-1 text-danger"></span>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                            
                                            <div class="check-group flexbox">
                                                <a class="text-muted" href="{{route('forgot.password')}}" style="float:left; margin-top: -20px; margin-bottom:20px;">Forgot password?</a>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                            <button type="submit" id="submit" class="slide-btn login-btn" >
                                                <i class="fa fa-spinner fa-spin d-none" style="display:none;"></i>
                                                <span id="msg">Login</span>
                                            </button>
                                            <div id="msgSubmit" class="h3 text-center hidden"></div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                            <div class="clear"></div>
                                            {{-- <div class="separetor text-center"><span>Or with Sign</span></div> --}}
                                            <div class="sign-icon">
                                                {{-- <ul>
                                                    <li><a class="facebook" href="#"><i class="ti-facebook"></i></a>
                                                    </li>
                                                    <li><a class="twitter" href="#"><i class="ti-spinner"></i></a></li>
                                                    <li><a class="google" href="#"><i class="ti-google"></i></a></li>
                                                </ul> --}}
                                                <div class="acc-not">Don't have an account? <a href="{{route('open.accountForm')}}">Open Account</a></div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    
  <!-- End Slider Area -->

    <!-- all js here -->

    <!-- jquery latest version -->
    <script src="{{asset('assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <!-- bootstrap js -->
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <!-- Form validator js -->
    <script src="{{asset('assets/js/form-validator.min.js')}}"></script>
    <!-- plugins js -->
    <script src="{{asset('assets/js/plugins.js')}}"></script>
   <script src="{{asset('assets/utility.js?version=1')}}"></script>
    <script src="{{asset('assets/pages/login.js?version=1')}}"></script>
</body>

</html>