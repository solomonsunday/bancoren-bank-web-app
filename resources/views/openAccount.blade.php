<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Open Account - City Bank Norway</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

     <meta name="csrf-token" content="{{@csrf_token()}}" />

    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/logo/favicon.ico')}}">

    <!-- all css here -->

    <!-- bootstrap v3.3.6 css -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <!-- font-icon css -->
    <link rel="stylesheet" href="{{asset('assets/css/themify-icons.css')}}">
    <!-- style css -->
    <link rel="stylesheet" href="{{asset('assets/style.css')}}">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/customstyles.css')}}">

    <!-- modernizr css -->
    <script src="{{asset('assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>

<body data-spy="scroll" data-target="#navbar-example">

       <div class="login-area area-padding fix">
        <div class="login-overlay"></div>
        <div class="table">
            <div class="table-cell">
                <div class="">
                    <div class="row">
                       
                        <div class="col-xs-12">
                            <div class="login-form signup-form">
                                 <div class="alert alert-success" style="display:none;"></div>
                                <h4 class="login-title text-center">REGISTER</h4>
                                <div class="row">
                                    <form id="openAccountForm" method="POST" action="{{route('open.account')}}" class="log-form">
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <label>Firstname</label>

                                            {{-- <span>First name required</span> --}}
                                            <input type="text" id="first_name" class="form-control" placeholder="Firstname" required data-error="Please enter your name" required>
                                            
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            
                                            <label>Surname</label>
                                             {{-- <span>First name required</span> --}}
                                            <input type="text" id="last_name" class="form-control" placeholder="Surname" required data-error="Please enter your name" required>
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <label>Othername</label>
                                             {{-- <span>First name required</span> --}}
                                            <input type="text" id="other_name" class="form-control" placeholder="Othername" required data-error="Please enter your name" required>
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <label>Mother Maiden Name</label>
                                             {{-- <span>First name required</span> --}}
                                            <input type="text" id="maiden_name" class="form-control" placeholder="Maiden Name" required data-error="Please enter your name" required>
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <label>Gender</label>
                                             {{-- <span>First name required</span> --}}
                                            <select class="form-control" required data-error="Select Gender" id="gender">
                                                <option class="text-primary">...Select...</option>
                                                <option value="1" class="text-primary">Male</option>
                                                <option value="2" class="text-primary">Female</option>
                                            </select>

                                        </div>
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <label>Date of Birth</label>
                                             {{-- <span>First name required</span> --}}
                                            <div>
                                                <fieldset class="fset">
                                                    <div class="field-inline-block ">
                                                        <label>DD</label>
                                                        <input type="text" pattern="[0-9]*" maxlength="2" size="2" class="date-field text-primary" id="day"  required/>
                                                    </div>
                                                    /
                                                    <div class="field-inline-block ">
                                                        <label>MM</label>
                                                        <input type="text" pattern="[0-9]*" maxlength="2" size="2" class="date-field text-primary" id="month" required/>
                                                    </div>
                                                    /
                                                    <div class="field-inline-block ">
                                                        <label>YYYY</label>
                                                        <input type="text" pattern="[0-9]*" maxlength="4" size="4" class="date-field date-field--year text-primary" id="year" required />
                                                    </div>
                                                    <p><small>E.g. 26/04/1980</small></p>
                                                </fieldset>
                                            </div>
                                            <!-- <input type="date" id="name" class="form-control"
                                                placeholder="Date of Birth" required
                                                data-error="Please enter date of birth"> -->
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <label>Occupation</label>
                                             {{-- <span>First name required</span> --}}
                                            <input type="text" id="occupation" class="form-control" placeholder="Occupation" required data-error="Please enter your Occupation">
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <label>Email</label>
                                             {{-- <span>First name required</span> --}}
                                            <input type="text" id="email" class="form-control" placeholder="Email" required data-error="Please enter your Email">
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <label>Nationality</label>
                                             {{-- <span>First name required</span> --}}
                                            <input type="text" id="nationality" class="form-control" placeholder="Nationality" required data-error="Please enter your Nationality">
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <label>Location</label>
                                             {{-- <span>First name required</span> --}}
                                            <textarea type="text" id="location" class="form-control">
                                            </textarea>
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <label>Contact</label>
                                             {{-- <span>First name required</span> --}}
                                            <input type="number" id="contact" class="form-control" placeholder="Contact" required data-error="Please enter your contact">
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <label>Contact 2</label>
                                             {{-- <span>First name required</span> --}}
                                            <input type="number" id="alt_contact" class="form-control" placeholder="Contact 2" required data-error="Please enter your contact">
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <label>Account Type</label>
                                             {{-- <span>First name required</span> --}}
                                            <select class="form-control" required data-error="Select Account Type" id="account_type">
                                                <option class="text-primary">Select Option</option>
                                                @foreach ($account_type as $type)
                                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                                @endforeach
                                                
                                            </select>

                                        </div>
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <label>Personal ID</label>
                                             {{-- <span>First name required</span> --}}
                                            <select class="form-control" required data-error="Select a verification ID" id="verification_id">
                                                <option class="text-primary">Select Option</option>
                                                @foreach ($verify_id as $id)
                                                    <option value="{{$id->id}}">{{$id->id_name}}</option>
                                                @endforeach
                                                

                                            </select>

                                        </div>
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <label>Valid Date</label>
                                             {{-- <span>First name required</span> --}}
                                            <input type="date" id="valid_date" class="form-control" placeholder="Valid Date" required data-error="Select a valid date">
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-xs-12 text-center">
                                            <div class="check-group flexbox">
                                                <label class="check-box">
                                                     {{-- <span>First name required</span> --}}
                                                    <input type="checkbox" class="check-box-input" id="terms" checked>
                                                    <span class="remember-text">I agree terms & conditions</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-12 col-xs-12 text-center pull-right">
                                            <button type="submit" id="submit" class="slide-btn login-btn">
                                                 <i class="fa fa-spinner fa-spin d-none" style="display:none;"></i>
                                                 <span id="msg">Open Account</span>
                                                
                                            </button>
                                            
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                            <div class="clear"></div>
                                            <div class="separetor text-center"><span>back to <a href="{{route('/')}}">Home</a> </span></div>
                                            <div class="sign-icon">
                                                {{-- <ul>
                                                    <li><a class="facebook" href="#"><i class="ti-facebook"></i></a>
                                                    </li>
                                                    <li><a class="twitter" href="#"><i class="ti-twitter"></i></a></li>
                                                    <li><a class="google" href="#"><i class="ti-google"></i></a></li>
                                                </ul> --}}
                                                <div class="acc-not">have an account? <a href="{{route('login')}}">Login</a>
                                                </div>
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

</body>
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
    <script src="{{asset('assets/js/custom.js?version=1')}}"></script>
    <script src="{{asset('assets/pages/utility.js?version=1')}}"></script>
    <script src="{{asset('assets/pages/openAccount.js?version=1')}}"></script>
   
</body>

</html>