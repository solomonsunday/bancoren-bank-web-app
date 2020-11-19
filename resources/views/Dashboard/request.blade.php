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
                            <h4 class="form-top">Request ATM</h4>
                                <div class="form-inner">
                                      <div class="alert alert-success" style="display:none;"></div>
                                    <form action="{{route('make.request')}}" id="make-request" >
                                        <div class="row">
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <label for="m-send">First Name</label>
                                                    <input type="text" id="first_name" required>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <label for="m-send">Last Name</label>
                                                    <input type="text" id="last_name" required>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <label for="m-send">Email</label>
                                                    <input type="email" id="email" required>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <label for="m-send">Address</label>
                                                    <input type="text" id="address" required>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <label for="m-send">Tel</label>
                                                    <input type="number" id="phone" required>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <label for="atmrequest">Request ATM/ Chequebook</label>
                                                    <select name="currency-select" id="request" required>
                                                        @foreach ($request_types as $type)
                                                            <option value="{{$type->id}}">{{$type->request_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

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
    <script src="{{mix('/assets/pages/request.js')}}"></script>
@endsection