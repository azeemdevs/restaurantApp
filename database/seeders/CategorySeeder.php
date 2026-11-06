<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->upsert([
            ['id' => 1, 'name' => 'food', 'created_at' => '2023-01-24 15:20:07', 'updated_at' => '2023-01-24 15:20:07'],
            ['id' => 4, 'name' => 'candle light', 'created_at' => '2023-01-25 00:02:45', 'updated_at' => '2023-01-25 00:34:06'],
            ['id' => 5, 'name' => 'ham burger', 'created_at' => '2023-01-25 00:03:03', 'updated_at' => '2023-01-25 00:03:03'],
            ['id' => 6, 'name' => 'fish', 'created_at' => '2023-01-25 00:37:33', 'updated_at' => '2023-01-25 00:37:33'],
            ['id' => 7, 'name' => 'chicken', 'created_at' => '2023-01-25 00:38:08', 'updated_at' => '2023-01-25 00:38:08'],
            ['id' => 8, 'name' => 'mutton', 'created_at' => '2023-01-25 00:38:28', 'updated_at' => '2023-01-25 00:38:28'],
            ['id' => 9, 'name' => 'drinks', 'created_at' => '2023-01-26 04:15:32', 'updated_at' => '2023-01-26 04:15:32'],
            ['id' => 10, 'name' => 'sweets', 'created_at' => '2023-01-26 07:01:38', 'updated_at' => '2023-01-26 07:01:38'],
        ], ['id'], ['name', 'created_at', 'updated_at']);
    }
}
