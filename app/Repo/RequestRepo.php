<?php

namespace App\Repo;

use App\Interfaces\Request;

class RequestRepo extends BaseRepo implements Request
{

    protected $table_name;

    public function __construct($table_name = "requests")
    {
        parent::__construct($table_name);
        $this->table_name = $table_name;
    }

    
}