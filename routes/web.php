<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('/');

Route::get('/about', function() {
    return view('about');
})->name('about'); 


Route::group(['middleware'=> 'guest'], function() {

    
    //Login endpoints
    Route::get('/login', 'AuthController@LoginForm')->name('login');
    Route::post('/login', 'AuthController@userLogin');


    Route::get('/open-account', 'AuthController@openAccountForm')->name('open.accountForm');
    Route::post('/open-account', 'AuthController@openAccount')->name('open.account');

    

    Route::get('/forgot-password', 'AuthController@forgotpasswordForm')->name('forgot.password');
    Route::post('/forgot-password', 'AuthController@forgotPassword');

   
});


Route::group(['middleware'=> 'auth'], function() {

    Route::get('/home', 'DashboardController@index')->name('home');
    Route::get('/logout', 'DashboardController@Logout')->name('logout');


    Route::get('send-money', 'TransactionController@sendmoneyForm')->name('send.moneyForm');
    Route::post('transfer-money', 'TransactionController@sendMoney')->name('send.money');

    Route::get('make-request', 'RequestController@requestForm')->name('request.form');
    Route::post('send-request','RequestController@makeRequest')->name('make.request');


    Route::get('account-details', 'DashboardController@accountDetails')->name('account.details');

    Route::get('transactions', 'TransactionController@transactionsLogs')->name('transaction.logs');

    Route::get('settings', 'SettingController@settingPage')->name('settings');

    Route::get('settings/change-password', 'SettingController@changePasswordPage')->name('change.password');
    Route::post('change-password', 'SettingController@changePassword')->name('password.change');

    Route::get('settings/profile', 'SettingController@profilePage')->name('profile');

    Route::get('setting/upload-image', 'SettingController@uploadImageForm')->name('upload.imageform');
    Route::post('setting/upload', 'SettingController@uploadImage')->name('upload.image');

    Route::get('/profile', 'DashboardController@profile')->name('profile');
    Route::post('/update/profile/{id}', 'DashboardController@updateProfile')->name('update.profile');

    Route::post('/confirm/token', 'TransactionController@confirmToken')->name('confirm.token');
    Route::get('/token/confirmation', 'TransactionController@tokenConfirmation')->name('token.confirm');
 
});
