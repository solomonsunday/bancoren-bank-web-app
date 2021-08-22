<?php

namespace App\Repo;

use App\Interfaces\Account;
use Illuminate\Support\Facades\DB;

class AccountRepo implements Account
{

    public function openAccount(array $data)
    {
       DB::beginTransaction();
       try {
           $user =  DB::table('users')->insertGetId([
                'uuid' => rand(1000, 9999),
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'password' => bcrypt('12345')
            ]);
           DB::table('customer_details')->insert([
                'user_id'=> $user,
                'account_number'=> rand(1000000000, 9999999999),
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
           'status'=> 1
       ];
    }
}