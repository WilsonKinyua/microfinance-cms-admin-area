<?php

namespace Database\Seeders;

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@microfinance.com',
                'password'       => bcrypt('admin@microfinance.com'),
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
