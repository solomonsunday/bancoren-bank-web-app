<?php

namespace App\Http\Controllers;

use App\Interfaces\Account;
use App\Interfaces\IUser;
use App\Interfaces\IUtility;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Traits\SendMail;
use App\Mail\WelcomeNotification;


class AuthController extends Controller
{
    use SendMail;
    
    public $user, $utility, $account;

    public function __construct(IUser $user, IUtility $utility, Account $account)
    {
        $this->user = $user;    
        $this->utility = $utility;
        $this->account = $account;
    }

    public function index()
    {

    }

    public function LoginForm()
    {
        return view('Auth.login');
    }

    public function openAccountForm()
    {
        $account_type = $this->utility->getaccount_types();
        
        $verification = $this->utility->verificationID();
        
        return view('openAccount', [
            'account_type'=> $account_type,
            'verify_id'=> $verification,
        ]);
    }

    public function forgotpasswordForm()
    {
        return view('Auth.forgot');
    }

    public function userLogin(Request $request)
    {
       
        $validate = Validator::make($request->all(), [
            'email'=> 'required|email',
            'password'=> 'required'
        ]);

        if($validate->fails()){
            return $this->sendBadRequestResponse($validate->errors());
        }

        if(Auth::attempt(['email'=>$request->get('email'), 'password'=> $request->get('password')])){
            $user = User::where('email', $request->get('email'))->first();

             if($user->status == 0){
               return $this->sendBadRequestResponse('Access Denied');
            }
         

            Auth::login($user);
            $intended_url = Redirect::intended("home")->getTargetUrl();
            return $this->sendSuccessResponse("Login Success", [
                "intended_url"=> $intended_url
            ]);
        }else{
            return $this->sendBadRequestResponse('Invalid credentials');
        }


    }

    public function confirmEmail()
    {
        $user = Auth::user();
       
        if($user->is_verified != 1){
            $this->user->updateItem(['id'=> $user->id], ['is_verified'=> 1]);
            $user->is_verified = 1;
            return $this->sendSuccessResponse('Email confirmed successfully', $user);
        }

        return $this->sendSuccessResponse('Email already verified', $user);
    }

    public function openAccount(Request $request)
    {
       
        $validate = Validator::make($request->all(), [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'other_name'=> 'required|string',
            'maiden_name'=> 'required|string',
            'gender'=> 'required|integer',
            'day'=> 'required|integer',
            'month'=> 'required|integer',
            'year'=> 'required|integer',
            'occupation'=> 'required|string',
            'email'=> 'required|email|unique:users',
            'nationality'=> 'required|string',
            'location'=> 'required|string',
            'contact'=> 'required|numeric',
            'alt_contact'=>'nullable|numeric',
            'account_type'=> 'required|integer',
            'verification_id'=> 'required|integer',
            'valid_date'=> 'required'
        ]);

        if ($validate->fails()) {
            return $this->sendBadRequestResponse($validate->errors());
        }

       $store = $this->account->openAccount([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'account_type' => $request->get('account_type'),
            'address' => $request->get('location'),
            'dateOfbirth' => $request->get('year')."-".$request->get('month')."-".$request->get('day'),
            'occupation' => $request->get('occupation'),
            'other_name' => $request->get('other_name'),
            'maiden_name' => $request->get('maiden_name'),
            'contact' => $request->get('contact'),
            'alt_contact' => $request->get('alt_contact') ?? null,
            'personal_id' => $request->get('verification_id'),
            'valid_date' => $request->get('valid_date'),
            'gender' => $request->get('gender'),
            'location'=> $request->get('location')
       ]);

       if($store->status != 1){
            return $this->sendBadRequestResponse($store->message);
       }
       
       // send mail 
       $name = $request->get('first_name'). ' '. $request->get('last_name');

       $this->send($request->get('email'), new WelcomeNotification($name, $store->data['ac_number'], $store->data['password']));

       $intended_url = Redirect::intended("login")->getTargetUrl();

       return $this->sendSuccessResponse($store->message, [
        "intended_url" => $intended_url
       ]);
    }
}
