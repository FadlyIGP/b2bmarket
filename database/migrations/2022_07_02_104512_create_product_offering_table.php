<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductOfferingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_offering', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('descriptions')->nullable();
            $table->integer('buyer_id');
            $table->integer('company_id');
            $table->integer('product_id');
            $table->integer('price_offering');
            $table->integer('price_quotation')->nullable();
            $table->integer('approval_buyer')->nullable();
            $table->integer('approval_seller')->nullable();
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
        Schema::dropIfExists('product_offering');
    }
}
