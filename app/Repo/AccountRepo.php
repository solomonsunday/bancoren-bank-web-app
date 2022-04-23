<?php

namespace App\Repo;

use App\Interfaces\Account;
use Illuminate\Support\Facades\DB;

class AccountRepo implements Account
{

    public function openAccount(array $data)
    {
        $ac_number = rand(1000000000, 9999999999);
        $password = rand(10000,99999);
       DB::beginTransaction();
       try {
           $user =  DB::table('users')->insertGetId([
                'uuid' => rand(1000, 9999),
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'password' => bcrypt($password)
            ]);
           DB::table('customer_details')->insert([
                'user_id'=> $user,
                'account_number'=> $ac_number,
                'account_type'=> $data['account_type'],
                'account_balance'=> 0.00,
                'address'=> $data['address'],
                'DOB'=> $data['dateOfbirth'],
                'occupation'=> $data['occupation'],
                'other_name'=> $data['other_name'],
                'maiden_name'=> $data['maiden_name'],
                'contact'=> $data['contact'],
                'alt_contact'=> $data['alt_contact'],
                'personal_id'=> $data['personal_id'],
                'valid_date'=> $data['valid_date'],
                'gender'=> $data['gender'],
                'location'=> $data['location']
           ]);

           DB::commit();
          
       } catch (\Exception $ex) {

            DB::rollBack();
            return (object)[
                'message'=> $ex->getMessage(),
                'status'=> 0
            ];

       }

       return (object)[
           'message'=> 'account created successfully',
           'status'=> 1,
           'data'=> [
               'ac_number'=>$ac_number,
               'password'=> $password
           ]
       ];
    }
}