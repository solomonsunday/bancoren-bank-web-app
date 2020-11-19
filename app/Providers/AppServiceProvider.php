<?php

namespace App\Providers;

use App\Interfaces\Account;
use App\Interfaces\Customer;
use App\Interfaces\IUser;
use App\Interfaces\IUtility;
use App\Interfaces\Request;
use App\Interfaces\Transaction;
use App\Repo\AccountRepo;
use App\Repo\CustomerRepo;
use App\Repo\RequestRepo;
use App\Repo\TransactionRepo;
use App\Repo\UserRepo;
use App\Repo\UtilityRepo;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(IUser::class, UserRepo::class);
        $this->app->singleton(IUtility::class, UtilityRepo::class);
        $this->app->singleton(Account::class, AccountRepo::class);
        $this->app->singleton(Transaction::class, TransactionRepo::class);
        $this->app->singleton(Customer::class, CustomerRepo::class);
        $this->app->singleton(Request::class, RequestRepo::class);

        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
