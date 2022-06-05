<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment', function (Blueprint $table) {
            $table->id();
            $table->integer('transaction_id');
            $table->integer('user_id');
            $table->string('currency');
            $table->string('external_id');
            $table->string('bank_code');
            $table->string('account_number')->nullable();
            $table->integer('expected_ammount');
            $table->datetime('paid_at')->nullable();
            $table->string('payment_chanel');
            $table->datetime('expiration_date');
            $table->string('name');
            $table->string('email');
            $table->integer('status');
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
        Schema::dropIfExists('payment');
    }
}
