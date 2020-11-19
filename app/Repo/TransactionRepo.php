<?php

namespace App\Repo;

use App\Interfaces\Transaction;
use Illuminate\Support\Facades\DB;

class TransactionRepo extends BaseRepo implements Transaction
{
    protected $table_name;

    public function __construct($table_name = "transactions")
    {
        parent::__construct($table_name);
        $this->table_name = $table_name;
    }

    public function recent_transaction()
    {
        return DB::table('transactions')
                    // ->leftJoin('transaction_types', 'transactions.transaction_type', '=', 'transaction_types.id')
                    ->leftJoin('transfer_types', 'transactions.transfer_type','=','transfer_types.id')
                    ->leftJoin('transfer_options', 'transactions.transfer_option', '=','transfer_options.id')
                    ->select(
                        'transactions.*',
                       // 'transaction_types.type_name',
                        'transfer_types.transfer_name',
                        'transfer_options.option_name'
                    )
                    ->latest('created_at')
                    ->first();
    }

    
}