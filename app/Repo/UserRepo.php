<?php

namespace App\Repo;

use App\Interfaces\IUser;
use Illuminate\Support\Facades\DB;


class UserRepo extends BaseRepo implements IUser
{
    protected $table_name;

    public function __construct($table_name="users")
    {
        parent::__construct($table_name);
        $this->table_name = $table_name;
    }

    public function userDetails($user_id)
    {
        return DB::table($this->table_name)
                    ->leftJoin('customer_details as d', "{$this->table_name}.id", '=', 'd.user_id')
                    ->leftJoin('account_types as at', "d.account_type", '=', 'at.id')
                    ->where("{$this->table_name}.id", $user_id)
                    ->select(
                        "{$this->table_name}.uuid", 
                        "{$this->table_name}.last_name", 
                        "{$this->table_name}.email", 
                        "{$this->table_name}.is_verified", 
                        "{$this->table_name}.status",
                        "{$this->table_name}.access_type",
                        "at.name",
                        "d.*"
                        )
                    ->first();
    }

    public function user_ac_balance($user_id)
    {
        return DB::table("customer_details")->where('user_id', $user_id)->value('account_balance');
    }
}