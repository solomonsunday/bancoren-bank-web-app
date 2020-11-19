@extends('layouts.dasboardlayout')

@section('dashboard-header')
    <div class="breadcrumb text-center">
        <div class="section-headline white-headline text-center">
            Dashboard
        </div>
        <ul>
            <li class="home-bread">home</li>
            <li>Dashboard</li>
        </ul>
    </div>
@endsection

@section('content-body')
     <div class="col-md-9 col-sm-9 col-xs-12">
                    <div class="dashboard-content">
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="single-curency">
                                    <div class="curency-text">
                                        <span class="c-country">T-Credit</span>
                                        <span class="c-money">{{$credit}}</span>
                                    </div>
                                </div>
                            </div>

                             <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="single-curency">
                                    <div class="curency-text">
                                        <span class="c-country">T-Debit</span>
                                        <span class="c-money">{{$debit}}</span>
                                    </div>
                                </div>
                            </div>

                              <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="single-curency">
                                    <div class="curency-text">
                                        <span class="c-country">T-Transactions</span>
                                        <span class="c-money">{{$total}}</span>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
    
@endsection