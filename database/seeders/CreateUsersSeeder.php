<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserMitra;
use App\Models\Roles;

use Illuminate\Support\Facades\Hash;


class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'Haykal',
            'email' => 'haykal@gmail.com',
            'password' =>  Hash::make('admin123'),
            'role_id' => 2
        ]);

        User::create([
            'name' => 'Fadly',
            'email' => 'fadly@gmail.com',
            'password' =>  Hash::make('admin123'),
            'role_id' => 1
        ]);

        UserMitra::create([
            'name'=> 'Haykal',
            'email'=> 'haykal@gmail.com',
            'phone'=> '085776670226',
            'tel_number'=> '0211131240',
            'status'=> 1,
            'company_id'=> 1,
            'address_id'=> 1,
        ]);

        UserMitra::create([
            'name'=> 'Fadly',
            'email'=> 'fadly@gmail.com',
            'phone'=> '085776670226',
            'tel_number'=> '0211131240',
            'status'=> 1,
            'company_id'=> 1,
            'address_id'=> 1,
        ]);
    }
}
