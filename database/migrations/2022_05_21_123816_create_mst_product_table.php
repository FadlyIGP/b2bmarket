<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMstProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_product', function (Blueprint $table) {
            $table->id();
            $table->integer('product_category_id');
            $table->string('product_name');
            $table->string('product_descriptions');
            $table->string('product_size');
            $table->integer('product_price');
            $table->string('product_item');
            $table->boolean('wishlist_status');
            $table->integer('company_id');
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
        Schema::dropIfExists('mst_product');
    }
}
