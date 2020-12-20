@extends('layouts.dasboardlayout')
@section('dashboard-header')
    <div class="breadcrumb text-center">
        <div class="section-headline white-headline text-center">
            Transaction Log
        </div>
        <ul>
            <li class="home-bread">Dashboard</li>
            <li>Transaction Log</li>
        </ul>
    </div>
@endsection

@section('content-body')
         <div class="col-md-9 col-sm-9 col-xs-12">
                    <div class="dashboard-content">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="send-money-form transection-log">
                                    <div class="form-text">
                                        <h4 class="form-top">Transection Log</h4>
                                        <div class="form-inner table-inner">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Transaction details</th>
                                                        <th>Type</th>
                                                        <th>Account number</th>
                                                        <th>Amount</th>
                                                        <th>Account Balance</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($logs as $transaction)
                                                    <tr>
                                                          <td>{{$transaction->created_at}}</td>
                                                        <td>{{$transaction->account_name}}</td>
                                                        <td>{{$transaction->type_name}}</td>
                                                        <td>{{$transaction->account_number}}</td>
                                                        
                                                        <td>{{$transaction->amount}}</td>
                                                        <td>{{$transaction->balance}}</td>
                                                    </tr>
                                                      
                                                    @endforeach
                                                    
                                                </tbody>
                                               
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection