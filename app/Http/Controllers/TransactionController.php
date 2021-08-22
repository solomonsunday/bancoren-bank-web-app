<?php

namespace App\Http\Controllers;

use App\Interfaces\Customer;
use App\Interfaces\IUser;
use App\Interfaces\IUtility;
use App\Interfaces\Transaction;
use App\Mail\sendToken;
use App\Traits\SendMail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class TransactionController extends Controller
{
    use SendMail;
    public $utility, $userLogic, $date;
    
    private $transaction, $customer;

    public function __construct(IUtility $utility, IUser $user, Transaction $transaction, Customer $customer)
    {
        $this->utility = $utility;   
        $this->userLogic = $user;
        $this->transaction = $transaction;
        $this->customer = $customer;
        $this->date = Carbon::now();
    }

    public function sendmoneyForm()
    {
        $user = Auth::user();
        $account_types = $this->utility->getaccount_types();
        $currencies = $this->utility->currencies();
        $transfer_types = $this->utility->transfer_types();
        $transfer_options = $this->utility->transfer_options();
        $user_balance = $this->userLogic->user_ac_balance($user->id);

        return view('Dashboard.sendmoney', [
            'ac_balance' => $user_balance ?? 0,
            'account_types'=> $account_types,
            'currencies'=> $currencies,
            'transfer_types'=> $transfer_types,
            'transfer_options'=> $transfer_options
        ]);
    }

    public function sendMoney(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'first_name'=> 'required|string',
            'last_name'=> 'required|string',
            'account_number'=> 'required|numeric',
            'depositor_name'=> 'required|string',
            'amount'=> 'required|numeric',
            'currency'=> 'required|integer',
            'transfer_type'=> 'required|numeric',
            'transfer_option'=> 'nullable|numeric',
            'account_type'=> 'required|integer',
            'user_identifier'=> 'required|string'
        ]);

        if ($validate->fails()) {
            return $this->sendBadRequestResponse($validate->errors());
        }

        $token = str_shuffle(mt_rand(1000, 9999));

        $receiver = $this->customer->findItem(['account_number'=> $request->get('account_number')]);
       

        if(is_null($receiver)){
            return $this->sendBadRequestResponse('Invalid Account number');
        }

        $check_balance = $this->check_balance($request->get('amount'));

        if($check_balance == false){
            return $this->sendBadRequestResponse('Insufficient balance');
        }

        $store = $this->transaction->create([
            'user_id'=> Auth::user()->id,
            'account_name' => $request->get('first_name') . ' ' . $request->get('last_name'),
            'account_number' => $request->get('account_number'),
            'account_type' => $request->get('account_type'),
            'depositor_name' => $request->get('depositor_name'),
            'amount' => $request->get('amount'),
            'currency'=> $request->get('currency'),
            'phone_number' => $request->get('user_identifier'),
            'transfer_type' => $request->get('transfer_type'),
            'transfer_option' => $request->get('transfer_option') ?? 0,
            'month' => $this->date->format('F'),
            'year' => $this->date->format('Y'),
            'token' => $token,
        ]);

        //send otp
        if($store){
        
            $recent = $this->transaction->recent_transaction();
            $receiveremail = $this->userLogic->findItem(['id' => $receiver->user_id]);
            $this->send($receiveremail->email, new sendToken($recent));

            return $this->sendSuccessResponse('Transaction done successfully' , [ 'intended_url'=> Redirect::intended("/token/confirmation")->getTargetUrl()]);
            
        }

        

       
       
    }

    public function tokenConfirmation()
    {
        $user = Auth::user();
        $account_types = $this->utility->getaccount_types();
        $currencies = $this->utility->currencies();
        $transfer_types = $this->utility->transfer_types();
        $transfer_options = $this->utility->transfer_options();
        $user_balance = $this->userLogic->user_ac_balance($user->id);

        return view('Dashboard.confirmToken', [
            'ac_balance' => $user_balance ?? 0,
            'account_types'=> $account_types,
            'currencies'=> $currencies,
            'transfer_types'=> $transfer_types,
            'transfer_options'=> $transfer_options
        ]);
    }

    public function confirmToken(Request $request){
       
        $validate = Validator::make($request->all(), [
            'token'=> 'required'
        ]);

        if($validate->fails()){
            return $this->sendBadRequestResponse($validate->errors());
        }

        $handle = $this->handleFinalTransferProcess($request->get('token'));
       

        if($handle->error == true){
            return $this->sendBadRequestResponse($handle->msg);
        }

       
        return $this->sendSuccessResponse('Transaction completed successfully', $handle);

        
    }

    private function check_balance($amount)
    {
        $user_id = Auth::user()->id;

    
        $user_balance = $this->userLogic->user_ac_balance($user_id);

        if($amount > $user_balance){
           return false;
        }

        return $user_balance;


    }

    private function deductBalance($amount) 
    {
        $user_id = Auth::user()->id;

        $user_balance = $this->userLogic->user_ac_balance($user_id);

        $new_balance = $user_balance - $amount;

        $this->customer->updateItem(['user_id'=> $user_id], [
            'account_balance'=> $new_balance
        ]);

        
        return $new_balance;

    }

    private function updateBalance($ac_number, $amount)
    {
        $ac_owner = $this->customer->findItem(['account_number'=> $ac_number]);

        $new_balance = $ac_owner->account_balance + $amount;

        $this->customer->updateItem(['id'=> $ac_owner->id], [
            'account_balance' => $new_balance
        ]);

        return $new_balance;
    }


    public function transactionsLogs()
    {
        $user = Auth::user();

        $user_balance = $this->userLogic->user_ac_balance($user->id);

        $transaction_logs =  DB::table('transaction_ledger AS tl')
                                    ->join('transactions AS t',  'tl.tran_id', '=', 't.id')
                                    ->leftJoin('transaction_types AS ty', 'tl.tran_type','=','ty.id')
                                    ->leftJoin('currencies AS c', 't.currency', '=', 'c.id')
                                    ->leftJoin('transfer_types AS t_type', 't.transfer_type', '=','t_type.id')
                                    ->leftJoin('transfer_options AS t_option', 't.transfer_option', '=','t_option.id')
                                    ->where('tl.user_id', $user->id)
                                    ->where('t.status', 1)
                                    ->select(
                                        't.account_name',
                                        't.account_number',
                                        't.amount',
                                        'c.currency_name',
                                        't_type.transfer_name',
                                        't_option.option_name',
                                        'ty.type_name',
                                        'tl.created_at',
                                        'tl.balance'
                                    )
                                    ->get();

        return view('Dashboard.transactionlogs', [
            'ac_balance' => $user_balance ?? 0,
            'logs'=> $transaction_logs
           
        ]);
    }

    private function handleFinalTransferProcess($token)
    {
          // get the transaction for the token
          $transaction = $this->transaction->findItem(['token'=> $token]);

          if($transaction == null){
              return (object)[
                'error'=> true,
                'msg'=> 'Invalid token'
              ];
          }

        try {
          
            DB::beginTransaction();

            // deduct the money from the sender
            $deduct_balance = $this->deductBalance($transaction->amount);

            DB::table('transaction_ledger')->insert([
                'user_id'=> Auth::user()->id,
                'tran_id'=> $transaction->id,
                'tran_type'=> 2,
                'balance'=> $deduct_balance
            ]);
    
            $receiver = $this->customer->findItem(['account_number'=> $transaction->account_number]);
            
            $receiver_balance = $this->updateBalance($receiver->account_number, $transaction->amount);
    
            //store credit transaction of the receiver
            DB::table('transaction_ledger')->insert([
                'user_id'=> $receiver->user_id,
                'tran_id'=> $transaction->id,
                'tran_type'=> 1,
                'balance'=> $receiver_balance
            ]);

            DB::table('transactions')->where('token', $token)->update([
                'token'=> null,
                'status'=> 1
            ]);

            DB::commit();

            return (object)[
                'error'=> false,
                'intended_url'=> Redirect::intended("home")->getTargetUrl()
            ];
        } catch (\Exception $ex) {
            //throw $th;

            
            DB::rollBack();

            dd($ex);

            return (object)[
                'error'=> true,
                'msg'=> $ex->getMessage()
            ];
        }
       
    }

}
