<?php

namespace App\Http\Controllers;

use App\Interfaces\Customer;
use App\Interfaces\IUser;
use App\Interfaces\IUtility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{

    private $userLogic, $details, $utility;
    
    public function __construct(IUser $user, Customer $customer, IUtility $utility)
    {
        $this->userLogic = $user;
        $this->details = $customer;
        $this->utility = $utility;
    }


    public function settingPage()
    {

        $user = Auth::user();

        $user_balance = $this->userLogic->user_ac_balance($user->id);
        
        return view('Dashboard.settings', [
            'ac_balance' => $user_balance ?? 0
        ]);
    }

    public function chnagePasswordPage()
    {
        
    }

    public function changePassword(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'old_password'=> 'required',
            'password'=> 'required|confirmed|min:8'
        ]);

        if($validate->fails()){
            return $this->sendBadRequestResponse($validate->errors());
        }

        $user = Auth::user();

        if(!Hash::check($request->get('old_password'), $user->password)){
            return $this->sendBadRequestResponse('Old Password does not match');
        }

        $update = $this->userLogic->updateItem(['id'=> $user->id], [
            'password'=> bcrypt($request->get('password'))
        ]);

        if(!$update){
            return $this->sendBadRequestResponse('Invalid request sent');
        }

        $intended_url = Redirect::intended("logout")->getTargetUrl();

        return $this->sendSuccessResponse("Password changed successfully", [
            "intended_url" => $intended_url
        ]);
       
    }


    public function uploadImageForm()
    {
        $user = Auth::user();

        $user_balance = $this->userLogic->user_ac_balance($user->id);

        return view('Dashboard.uploadImage', [
            'ac_balance' => $user_balance ?? 0
        ]);
    }

    public function uploadImage(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'image'=> 'required|image|mimes:png,jpg'
        ]);

        if($validate->fails()){
            return $this->sendBadRequestResponse($validate->errors());
        }


    }
}
