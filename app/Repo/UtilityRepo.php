<?php

namespace App\Repo;

use App\Interfaces\IUtility;
use Illuminate\Support\Facades\DB;

class UtilityRepo implements IUtility
{

    public function getaccount_types()
    {
        return DB::table('account_types')->select('id', 'name')->get();
    }

    public function transaction_types()
    {
        return DB::table('transaction_types')->select('id', 'type_name')->get();
    }

    public function transfer_options()
    {
        return DB::table('transfer_options')->select('id', 'option_name')->get();
    }

    public function transfer_types()
    {
        return DB::table('transfer_types')->select('id', 'transfer_name')->get();
    }

    public function verificationID()
    {
        return DB::table('verification_ids')->select('id', 'id_name')->get();
    }

    public function currencies()
    {
        return DB::table('currencies')->select('id', 'currency_name')->get();
    }
    

    public function request_types()
    {
        return DB::table('request_types')->select('id', 'request_name')->get();
    }

    public function total_transactions($user_id)
    {
        return DB::table('transaction_ledger AS tl')->where('user_id', $user_id)->count();
                        
    }

    public function total_credit($user_id)
    {
        return DB::table('transaction_ledger AS tl')
                                ->where(['user_id'=> $user_id, 'tran_type'=> 1])
                                ->count();
    }

    public function total_debit($user_id)
    {
        return DB::table('transaction_ledger AS tl')
                            ->where(['user_id' => $user_id, 'tran_type' => 2])
                            ->count();
    }
}