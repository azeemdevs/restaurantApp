<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SaleDetailSeeder extends Seeder
{
    public function run()
    {
        DB::table('sale_details')->upsert([
            ['id' => 35, 'sale_id' => 11, 'menu_id' => 6, 'menu_name' => 'ham burger', 'menu_price' => 5, 'quantity' => 1, 'status' => 'confirm', 'created_at' => '2023-01-27 19:34:21', 'updated_at' => '2023-01-27 19:34:33'],
            ['id' => 36, 'sale_id' => 11, 'menu_id' => 7, 'menu_name' => 'Coffee', 'menu_price' => 2, 'quantity' => 1, 'status' => 'confirm', 'created_at' => '2023-01-27 19:34:28', 'updated_at' => '2023-01-27 19:34:33'],
            ['id' => 37, 'sale_id' => 12, 'menu_id' => 3, 'menu_name' => 'fish roasted', 'menu_price' => 12, 'quantity' => 1, 'status' => 'confirm', 'created_at' => '2023-01-30 01:37:35', 'updated_at' => '2023-01-30 01:37:41'],
            ['id' => 38, 'sale_id' => 12, 'menu_id' => 4, 'menu_name' => 'Bar Bee Que', 'menu_price' => 20, 'quantity' => 1, 'status' => 'confirm', 'created_at' => '2023-01-30 01:37:40', 'updated_at' => '2023-01-30 01:37:41'],
            ['id' => 39, 'sale_id' => 13, 'menu_id' => 7, 'menu_name' => 'Coffee', 'menu_price' => 2, 'quantity' => 1, 'status' => 'confirm', 'created_at' => '2023-01-30 01:52:08', 'updated_at' => '2023-01-30 01:52:09'],
            ['id' => 40, 'sale_id' => 14, 'menu_id' => 6, 'menu_name' => 'ham burger', 'menu_price' => 5, 'quantity' => 1, 'status' => 'confirm', 'created_at' => '2023-01-30 02:35:03', 'updated_at' => '2023-01-30 02:35:09'],
            ['id' => 41, 'sale_id' => 14, 'menu_id' => 7, 'menu_name' => 'Coffee', 'menu_price' => 2, 'quantity' => 1, 'status' => 'confirm', 'created_at' => '2023-01-30 02:35:07', 'updated_at' => '2023-01-30 02:35:09'],
            ['id' => 42, 'sale_id' => 15, 'menu_id' => 6, 'menu_name' => 'ham burger', 'menu_price' => 5, 'quantity' => 1, 'status' => 'confirm', 'created_at' => '2023-01-30 03:58:51', 'updated_at' => '2023-01-30 03:58:55'],
            ['id' => 43, 'sale_id' => 15, 'menu_id' => 3, 'menu_name' => 'fish roasted', 'menu_price' => 12, 'quantity' => 1, 'status' => 'confirm', 'created_at' => '2023-01-30 03:58:53', 'updated_at' => '2023-01-30 03:58:55'],
            ['id' => 44, 'sale_id' => 16, 'menu_id' => 6, 'menu_name' => 'ham burger', 'menu_price' => 5, 'quantity' => 1, 'status' => 'confirm', 'created_at' => '2023-01-31 01:37:55', 'updated_at' => '2023-01-31 02:17:04'],
        ], ['id'], [
            'sale_id',
            'menu_id',
            'menu_name',
            'menu_price',
            'quantity',
            'status',
            'created_at',
            'updated_at',
        ]);
    }
}
