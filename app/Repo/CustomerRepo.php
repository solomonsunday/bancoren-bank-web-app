<?php

namespace App\Repo;

use App\Interfaces\Customer;
use Illuminate\Support\Facades\DB;

class CustomerRepo extends BaseRepo implements Customer
{
    protected $table_name;

    public function __construct($table_name = "customer_details")
    {
        parent::__construct($table_name);
        $this->table_name = $table_name;
    }

    
}
