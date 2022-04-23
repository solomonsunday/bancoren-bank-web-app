@extends('layouts.dasboardlayout')
@section('dashboard-header')
    <div class="breadcrumb text-center">
        <div class="section-headline white-headline text-center">
            Send Money
        </div>
        <ul>
            <li class="home-bread">Dashboard</li>
            <li>Send Money</li>
        </ul>
    </div>
@endsection
@section('content-body')
        <div class="col-md-9 col-sm-9 col-xs-12">
                    <div class="dashboard-content">
                        <div class="form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="send-money-form">
                                    <div class="form-text">
                                        
                                        <h4 class="form-top">Send Money</h4>
                                        <div class="form-inner">
                                              <div class="alert alert-success" style="display:none;"></div>
                                            <form action="{{route('send.money')}}" id="send-money" method="POST">
                                                <div class="">

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="m-send">First Name</label>
                                                            <input type="text" id="first_name" required>
                                                        </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <label for="m-send">Last Name</label>
                                                                <input type="text" id="last_name" required>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <label for="m-send">Account Number</label>
                                                                <input type="number" id="account_number" required>
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <label for="m-send">Depositor Name</label>
                                                                <input type="text" id="depositor_name" required>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="m-send">Amount</label>
                                                            <input type="number" value="" id="amount" required>
                                                        </div>

                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <label for="currencyfrr">Curreny</label>
                                                            <select name="currency-select" id="currency" required>
                                                                <option value="0" selected>Select Currency</option>
                                                                @foreach ($currencies as $currency)
                                                                    <option value="{{$currency->id}}">{{$currency->currency_name}}</option>
                                                                @endforeach
                                                            </select>
                                                         </div>
                                                        </div>
                                                    </div>



                                                    <div class="row">
                                                        <div class="col-md-12">

                                                             <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <label for="transferType">Transfer Type</label>
                                                                <select name="currency-select" id="transfer_type" required>
                                                                    <option value="0" selected>Select Transfer type</option>
                                                                    @foreach ($transfer_types as $types)
                                                                        <option value="{{$types->id}}">{{$types->transfer_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                             <div class="col-md-6 col-sm-6 col-xs-12" id="option" style="display:none;">
                                                                <label for="transferType">Transfer Option</label>
                                                                <select name="currency-select" id="transfer_option">
                                                                    <option value="0" selected>Select Transfer Option</option>
                                                                    @foreach ($transfer_options as $types)
                                                                        <option value="{{$types->id}}">{{$types->option_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                    
                                                    
                                                        </div>

                                                    </div>
                                                    


                                                    
                                                  <div class="row">
                                                      <div class="col-md-12">
                                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="accountType">Account Type</label>
                                                                <select name="currency-select" id="account_type">
                                                                    <option selected> Select Account Type</option>
                                                                    @foreach ($account_types as $types)
                                                                        <option value="{{$types->id}}">{{$types->name}}</option>
                                                                    @endforeach
                                                                    
                                                                </select>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <label for="m-send">Tel No / Email</label>
                                                            <input type="text" placeholder="Tel Number / Email" id="user_identifier" required>
                                                        </div>
                                                      </div>
                                                    

                                                  </div>

                                                  <div class="row">
                                                    <div class="col-md-12">
                                                            <div class="col-md-4 col-sm-4 col-xs-12 pull-right">

                                                            <button type="submit">
                                                                <i class="fa fa-spinner fa-spin d-none" style="display:none;"></i>
                                                                <span id="msg">Submit</span>
                                                            </button>
                                                        </div>
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
    
@endsection

@section('scripts')
    <script src="{{URL::to('/assets/pages/sendMoney.js')}}"></script>
@endsection