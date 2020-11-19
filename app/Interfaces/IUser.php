<?php

namespace App\Interfaces;


interface IUser extends IBase
{
    public function userDetails($user_id);
    public function user_ac_balance($user_id);
}