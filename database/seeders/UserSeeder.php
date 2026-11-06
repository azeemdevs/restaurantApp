<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $password = Hash::make('User@1234');

        DB::table('users')->upsert([
            [
                'id' => 1,
                'name' => 'admin',
                'role' => 'admin',
                'email' => 'azeem@gmail.com',
                'email_verified_at' => null,
                'password' => $password,
                'remember_token' => null,
                'created_at' => '2023-01-24 00:06:05',
                'updated_at' => '2023-01-31 03:40:43',
            ],
            [
                'id' => 2,
                'name' => 'tania',
                'role' => 'admin',
                'email' => 'user1@gmail.com',
                'email_verified_at' => null,
                'password' => $password,
                'remember_token' => null,
                'created_at' => '2023-01-24 00:07:12',
                'updated_at' => '2023-01-24 00:07:12',
            ],
            [
                'id' => 4,
                'name' => 'Claudia',
                'role' => 'cashier',
                'email' => 'claudia@restaurant.com',
                'email_verified_at' => null,
                'password' => $password,
                'remember_token' => null,
                'created_at' => '2023-01-30 23:45:36',
                'updated_at' => '2023-01-30 23:45:36',
            ],
            [
                'id' => 5,
                'name' => 'Tom',
                'role' => 'cashier',
                'email' => 'tomcruise@hotmail.com',
                'email_verified_at' => null,
                'password' => $password,
                'remember_token' => null,
                'created_at' => '2023-01-31 01:03:59',
                'updated_at' => '2023-01-31 01:03:59',
            ],
        ], ['id'], [
            'name',
            'role',
            'email',
            'email_verified_at',
            'password',
            'remember_token',
            'created_at',
            'updated_at',
        ]);
    }
}
