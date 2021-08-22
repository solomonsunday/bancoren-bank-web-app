{{-- @extends('layouts.dasboardlayout')
@section('dashboard-header')
    <div class="breadcrumb text-center">
        <div class="section-headline white-headline text-center">
            Complete Transaction
        </div>
        <ul>
            <li class="home-bread">Dashboard</li>
            <li>Confirm Token</li>
        </ul>
    </div>
@endsection
@section('content')
    <div class="col-md-9 col-sm-9 col-xs-12">
        <div class="dashboard-content">
           <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="save-money-form">
                        <div class="form-text">
                            <h4 class="form-top">Confirm Token</h4>
                                <div class="form-inner">
                                    <div class="alert alert-success" style="display:none;"></div>

                                    <form action="{{route('confirm.token')}}" id="confirm_token">
                                        <div class="row">

                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                               <label for="m-send">Enter Token</label>
                                               <input type="number" id="token" required>
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
@endsection --}}


@extends('layouts.dasboardlayout')

@section('dashboard-header')
    <div class="breadcrumb text-center">
        <div class="section-headline white-headline text-center">
            Complete Transaction
        </div>
        <ul>
            <li class="home-bread">Dashboard</li>
            <li>Confirm Token</li>
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
                              <h4 class="form-top">Confirm Token</h4>
                               <div class="form-inner">
                                   <div class="alert alert-success" style="display:none;"></div>
                                 <form action="{{route('confirm.token')}}" id="change-token">
                                      <div class="row">

                                         <div class="col-md-12 col-sm-12 col-xs-12">
                                            <label for="m-send">Enter Token</label>
                                            <input type="number" id="token" required>
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
    <script src="{{mix('/assets/pages/confirmToken.js')}}"></script>
@endsection

