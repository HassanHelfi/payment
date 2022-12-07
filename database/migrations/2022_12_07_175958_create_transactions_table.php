<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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

            $table->unsignedBigInteger('from_account_id');
            $table->foreign('from_account_id')->references('id')->on('accounts');
            
            $table->unsignedBigInteger('to_account_id');
            $table->foreign('to_account_id')->references('id')->on('accounts');

            $table->unsignedBigInteger('payment_request_id');
            $table->foreign('payment_request_id')->references('id')->on('payment_requests');
            
            $table->unsignedInteger('price');
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
};
