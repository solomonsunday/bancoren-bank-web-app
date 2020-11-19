<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('account_name');
            $table->string('account_number');
            $table->bigInteger('account_type');
            $table->string('depositor_name');
            $table->bigInteger('amount');
            $table->string('phone_number');
            $table->bigInteger('transfer_type');
            $table->bigInteger('transfer_option');
            $table->boolean('status')->default(0);
            $table->string('month');
            $table->string('year');
            $table->string('token');
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
        Schema::dropIfExists('transactions');
    }
}
