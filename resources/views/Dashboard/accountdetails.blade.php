@extends('layouts.dasboardlayout')
@section('dashboard-header')
    <div class="breadcrumb text-center">
        <div class="section-headline white-headline text-center">
            Account Detail
        </div>
        <ul>
            <li class="home-bread">Dashboard</li>
            <li>Account Detail</li>
        </ul>
    </div>
@endsection


@section('content-body')
    <div class="col-md-9 col-sm-9 col-xs-12">
                    <div class="dashboard-content">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="send-money-form add-bank-form">
                                    <div class="form-text">
                                        <h4 class="form-top">Account Detail</h4>
                                        <div class="faq-page bg-color area-padding" style=padding-top:50px>
                                            <div class="container mt-5">

                                                <div class="all-faq-text">

                                                    <div class="faq-details">
                                                        <div class="panel-group" id="accordion">
                                                            <div class="panel panel-default">
                                                                <div class="panel-heading">
                                                                    <h4 class="check-title">
                                                                        <a>
                                                                            <span></span>Account Name : {{$authuser->first_name}} {{$authuser->last_name}}
                                                                        </a>
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                            <div class="panel panel-default">
                                                                <div class="panel-heading">
                                                                    <h4 class="check-title" style="text-transform: lowercase;">
                                                                        <a>
                                                                            <span></span>Email : {{Str::lower($authuser->email)}}
                                                                        </a>
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                            <div class="panel panel-default">
                                                                <div class="panel-heading">
                                                                    <h4 class="check-title">
                                                                        <a>
                                                                            <span></span>Phone Number : {{$details->contact}}
                                                                        </a>
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                            <div class="panel panel-default">
                                                                <div class="panel-heading">
                                                                    <h4 class="check-title">
                                                                        <a>
                                                                            <span></span>Account Number : {{$details->account_number}}
                                                                        </a>
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                            <div class="panel panel-default">
                                                                <div class="panel-heading">
                                                                    <h4 class="check-title">
                                                                        <a>
                                                                            <span></span>Account Type : {{$account_type}}
                                                                        </a>
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                            <div class="panel panel-default">
                                                                <div class="panel-heading">
                                                                    <h4 class="check-title">
                                                                        <a>
                                                                            <span></span>Account Balance : ${{$details->account_balance}}
                                                                        </a>
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
@endsection