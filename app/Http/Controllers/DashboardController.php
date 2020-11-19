<?php

namespace App\Http\Controllers;

use App\Interfaces\Customer;
use App\Interfaces\IUser;
use App\Interfaces\IUtility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

  
    private $userLogic, $details, $utility;

    public function __construct(IUser $user, Customer $customer, IUtility $utility)
    {
       
        $this->userLogic = $user;
        $this->details = $customer;
        $this->utility = $utility;
    }

    public function index()
    {
        $user_id = Auth::user()->id;
        
        $user_balance = $this->userLogic->user_ac_balance($user_id);
        $total_credit = $this->utility->total_credit($user_id);
        $total_debit = $this->utility->total_debit($user_id);
        $total = $this->utility->total_transactions($user_id);

       
       
        return view('Dashboard.home', [
            'ac_balance'=> $user_balance ?? 0,
            'total'=> $total,
            'credit'=> $total_credit,
            'debit'=> $total_debit
        ]);
    }

    public function Logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }


    public function accountDetails()
    {
        $user = Auth::user();

        $user_balance = $this->userLogic->user_ac_balance($user->id);
        $customer_details = $this->details->findItem(['user_id'=> $user->id]);
        $account_type = DB::table('account_types')->where('id', $customer_details->account_type)->first();
        return view('Dashboard.accountdetails', [
            'ac_balance' => $user_balance ?? 0,
            'authuser'=> $user,
            'details'=> $customer_details,
            'account_type'=> $account_type->name
        ]);
    }
}
