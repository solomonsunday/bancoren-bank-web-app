@extends('layouts.dasboardlayout')
@section('dashboard-header')
    <div class="breadcrumb text-center">
        <div class="section-headline white-headline text-center">
            Request ATM/ Cheque Book
        </div>
        <ul>
            <li class="home-bread">Dashboard</li>
            <li>Request Atm / Cheque Book</li>
        </ul>
    </div>
@endsection
@section('content-body')
    <div class="col-md-9 col-sm-9 col-xs-12">
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="send-money-form">
                        <div class="form-text">
                            <h4 class="form-top">Profile</h4>
                                <div class="form-inner">
                                      <div class="alert alert-success" style="display:none;"></div>
                                      @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                         @if (session('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                                </div>
                                        @endif

                                        @if (session('danger'))
                                                <div class="alert alert-danger">
                                                    {{ session('danger') }}  

                                                </div>
                                         @endif

                                         <form action="{{route('update.profile', Auth::user()->id)}}" method="POST" id="make-request" >
                                        @csrf
                                        <div class="row">
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <label for="m-send">First Name</label>
                                                    <input type="text" id="first_name" name="first_name" value="{{$authuser->first_name}}" required>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <label for="m-send">Last Name</label>
                                                    <input type="text" id="last_name" name="last_name" value="{{$authuser->last_name}}" required>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <label for="m-send">Email</label>
                                                    <input type="email" id="email" name="email" value="{{$authuser->email}}" required>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <label for="m-send">Address</label>
                                                    <input type="text" id="address" name="address" value="{{$details->address}}" required>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <label for="m-send">Tel</label>
                                                    <input type="number" id="phone" name="phone" value="{{$details->contact}}" required>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <label for="m-send">Occupation</label>
                                                    <input type="text" id="occupation" name="occupation"  value="{{$details->occupation}}" required>
                                                </div>
                                              

                                                <div class="col-md-4 col-sm-4 col-xs-12 pull-right">
                                                  
                                                      <button type="submit">
                                                                <i class="fa fa-spinner fa-spin d-none" style="display:none;"></i>
                                                                <span id="msg">update profile</span>
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

{{-- @section('scripts')
    <script src="{{mix('/assets/pages/request.js')}}"></script>
@endsection --}}