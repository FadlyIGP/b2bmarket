<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MstTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // data faker indonesia
        $faker = Faker::create('id_ID');
 
        // membuat data dummy sebanyak 10 record
        for($x = 1; $x <= 50; $x++){

        	// insert data dummy pegawai dengan faker
        	DB::table('mst_transaction')->insert([
        		'invoice_number' 	=> 'INV2022000000'.$x,
        		'user_id' 			=> 3,
        		'company_id' 		=> 2,
        		'status' 			=> 99,
        		'address_id' 		=> 1,
        		'expected_ammount'	=> 500000,
        		'created_at'		=> $faker->date('2022-m-d'),
        		'cancel_reason'		=> ''
        	]);
        }
    }
}
