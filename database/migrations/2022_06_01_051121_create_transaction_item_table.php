<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_item', function (Blueprint $table) {
            $table->id();
            $table->integer('transaction_id');
            $table->string('product_name');
            $table->string('product_descriptions')->nullable();
            $table->string('product_size');
            $table->integer('product_price');
            $table->string('product_item');
            $table->integer('product_qty');
            $table->softDeletes();
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
        Schema::dropIfExists('transaction_item');
    }
}
