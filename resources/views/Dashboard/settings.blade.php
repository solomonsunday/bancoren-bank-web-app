@extends('layouts.dasboardlayout')

@section('dashboard-header')
    <div class="breadcrumb text-center">
        <div class="section-headline white-headline text-center">
            Settings
        </div>
        <ul>
            <li class="home-bread">Dashboard</li>
            <li>settings</li>
        </ul>
    </div>
@endsection

@section('content-body')

     <div class="col-md-9 col-sm-9 col-xs-12">
         <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="save-money-form">
                        <div class="form-text">
                              <h4 class="form-top">Change Password</h4>
                               <div class="form-inner">
                                   <div class="alert alert-success" style="display:none;"></div>
                                 <form action="{{route('password.change')}}" id="change-password">
                                      <div class="row">

                                         <div class="col-md-12 col-sm-12 col-xs-12">
                                            <label for="m-send">Old Password</label>
                                            <input type="password" id="old_password" required>
                                        </div>

                                        

                                      </div>

                                      <div class="row">

                                         <div class="col-md-6 col-sm-6 col-xs-12">
                                            <label for="m-send">New Password</label>
                                            <input type="password" id="password" required>
                                        </div>

                                         <div class="col-md-6 col-sm-6 col-xs-12">
                                            <label for="m-send">Confirm Password</label>
                                            <input type="password" id="password_confirmation" required>
                                        </div>

                                      </div>

                                      <div class="row">
                                        <div class="col-md-4 col-sm-4 col-xs-12 pull-right">
                                            <button type="submit">
                                                    <i class="fa fa-spinner fa-spin d-none" style="display:none;"></i>
                                                    <span id="msg">Submit</span>
                                            </button>
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
@endsection

@section('scripts')
    <script src="{{mix('/assets/pages/changePassword.js')}}"></script>
@endsection

