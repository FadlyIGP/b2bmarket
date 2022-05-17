<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
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
            'name' => 'Fadlli',
            'email' => 'fadlya179@gmail.com',
            'password' =>  Hash::make('admin123'),
            'role_id' => 1

        ]);
    }
}
