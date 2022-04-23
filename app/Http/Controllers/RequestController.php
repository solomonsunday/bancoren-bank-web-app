<?php

namespace App\Http\Controllers;

use App\Interfaces\Customer;
use App\Interfaces\IUser;
use App\Interfaces\IUtility;
use App\Interfaces\Request as InterfacesRequest;
use App\Mail\requestNoitification;
use App\Traits\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RequestController extends Controller
{
    use SendMail;
    private $userLogic, $details, $utility, $makeRequest;

    public function __construct(IUser $user, Customer $detail, IUtility $Utility, InterfacesRequest $makeRequest)
    {
        $this->userLogic = $user;
        $this->details = $detail;  
        $this->utility = $Utility; 
        $this->makeRequest = $makeRequest;
    }

    public function requestForm()
    {
        $user_id = Auth::user()->id;

        $user_balance = $this->userLogic->user_ac_balance($user_id);

        $request_type = $this->utility->request_types();

        return view('Dashboard.request', [
            'ac_balance' => $user_balance ?? 0,
            'request_types'=>  $request_type
        ]);
    }

    public function makeRequest(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'first_name'=> 'required|string',
            'last_name'=> 'required|string',
            'address'=> 'required|string',
            'request'=> 'required|numeric',
            'phone'=> 'required|numeric',
            'email'=> 'required'
        ]);

        if($validate->fails()){
            return $this->sendBadRequestResponse($validate->errors());
        }

        $user = Auth::user();
        $request_type = DB::table('request_types')->where('id', $request->get('request'))->first();
        $customer_details = DB::table('customer_details')->where("user_id", $user->id)->first();

        $store = $this->makeRequest->create([
            'user_id'=> $user->id,
            'user_details'=> $request->get('first_name'). " ". $request->get('last_name'),
            'request_type'=> $request->get('request'),
            'phone'=> $request->get('phone'),
            'location'=> $request->get('address'),
            'email'=> $request->get('email'),
            'account_number'=> $customer_details->account_number
        ]);

        
        if($store){

            //send notify account owner
            //$this->send($user->email, new requestNoitification($user));
            
            return $this->sendSuccessResponse("{$request_type->request_name} request made successfully", []);
        }
       
    }


}
