<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableSeeder extends Seeder
{
    public function run()
    {
        DB::table('tables')->upsert([
            ['id' => 2, 'name' => 'A1', 'status' => 'unavailable', 'created_at' => '2023-01-25 06:46:40', 'updated_at' => '2023-01-31 01:37:55'],
            ['id' => 3, 'name' => 'A2', 'status' => 'available', 'created_at' => '2023-01-25 06:48:35', 'updated_at' => '2023-01-27 18:08:47'],
            ['id' => 4, 'name' => 'A3', 'status' => 'available', 'created_at' => '2023-01-25 07:37:43', 'updated_at' => '2023-01-30 01:52:17'],
            ['id' => 5, 'name' => 'A4', 'status' => 'available', 'created_at' => '2023-01-25 07:37:48', 'updated_at' => '2023-01-27 15:45:13'],
        ], ['id'], ['name', 'status', 'created_at', 'updated_at']);
    }
}
