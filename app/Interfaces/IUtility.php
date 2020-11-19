<?php

namespace App\Interfaces;

interface IUtility
{
    public function getaccount_types();
    public function transaction_types();
    public function transfer_options();
    public function transfer_types();
    public function verificationID();
    public function currencies();
    public function request_types();
    public function total_debit($user_id);
    public function total_credit($user_id);
    public function total_transactions($user_id);
}