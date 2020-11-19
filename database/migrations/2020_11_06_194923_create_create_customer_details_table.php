<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreateCustomerDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('account_number');
            $table->bigInteger('account_type');
            $table->bigInteger('account_balance');
            $table->text('address');
            $table->string('image_path');
            $table->string('DOB');
            $table->string('occupation');
            $table->string('other_name');
            $table->string('maiden_name');
            $table->string('location');
            $table->string('contact');
            $table->string('alt_contact');
            $table->string('personal_id');
            $table->dateTime('valid_date');
            $table->tinyInteger('gender');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_details');
    }
}
