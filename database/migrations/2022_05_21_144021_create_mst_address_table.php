<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMstAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_address', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('user_id');
            $table->string('company_id');
            $table->string('contact');
            $table->string('provinsi');
            $table->string('kabupaten');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->string('complete_address');
            $table->string('patokan');
            $table->string('postcode');
            $table->string('primary_address');
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
        Schema::dropIfExists('mst_address');
    }
}
