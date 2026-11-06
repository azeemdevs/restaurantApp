<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SaleSeeder extends Seeder
{
    public function run()
    {
        DB::table('sales')->upsert([
            ['id' => 11, 'table_id' => 2, 'table_name' => 'A1', 'user_id' => 2, 'user_name' => 'tania', 'total_price' => '7.00', 'total_recieved' => '7.00', 'change' => '0.00', 'payment_type' => 'cash', 'sale_status' => 'paid', 'created_at' => '2023-01-27 19:34:07', 'updated_at' => '2023-01-27 19:38:52'],
            ['id' => 12, 'table_id' => 2, 'table_name' => 'A1', 'user_id' => 2, 'user_name' => 'tania', 'total_price' => '32.00', 'total_recieved' => '35.00', 'change' => '3.00', 'payment_type' => 'cash', 'sale_status' => 'paid', 'created_at' => '2023-01-30 01:37:35', 'updated_at' => '2023-01-30 01:37:53'],
            ['id' => 13, 'table_id' => 4, 'table_name' => 'A3', 'user_id' => 2, 'user_name' => 'tania', 'total_price' => '2.00', 'total_recieved' => '10.00', 'change' => '8.00', 'payment_type' => 'cash', 'sale_status' => 'paid', 'created_at' => '2023-01-30 01:52:08', 'updated_at' => '2023-01-30 01:52:17'],
            ['id' => 14, 'table_id' => 2, 'table_name' => 'A1', 'user_id' => 2, 'user_name' => 'tania', 'total_price' => '7.00', 'total_recieved' => '10.00', 'change' => '3.00', 'payment_type' => 'cash', 'sale_status' => 'paid', 'created_at' => '2023-01-30 02:35:03', 'updated_at' => '2023-01-30 02:35:15'],
            ['id' => 15, 'table_id' => 2, 'table_name' => 'A1', 'user_id' => 3, 'user_name' => 'roopi kaur', 'total_price' => '17.00', 'total_recieved' => '17.00', 'change' => '0.00', 'payment_type' => 'cash', 'sale_status' => 'paid', 'created_at' => '2023-01-30 03:58:51', 'updated_at' => '2023-01-30 03:59:02'],
            ['id' => 16, 'table_id' => 2, 'table_name' => 'A1', 'user_id' => 4, 'user_name' => 'Claudia', 'total_price' => '5.00', 'total_recieved' => '0.00', 'change' => '0.00', 'payment_type' => '', 'sale_status' => 'unpaid', 'created_at' => '2023-01-31 01:37:55', 'updated_at' => '2023-01-31 02:17:04'],
        ], ['id'], [
            'table_id',
            'table_name',
            'user_id',
            'user_name',
            'total_price',
            'total_recieved',
            'change',
            'payment_type',
            'sale_status',
            'created_at',
            'updated_at',
        ]);
    }
}
