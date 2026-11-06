<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    public function run()
    {
        DB::table('menus')->upsert([
            [
                'id' => 3,
                'name' => 'fish roasted',
                'price' => '12.00',
                'image' => '0125202309132563d0f2b543a39.jpg',
                'description' => 'A roasted fish is awesome for health',
                'category_id' => 6,
                'created_at' => '2023-01-25 03:02:39',
                'updated_at' => '2023-01-25 04:13:25',
            ],
            [
                'id' => 4,
                'name' => 'Bar Bee Que',
                'price' => '20.00',
                'image' => '0125202308042963d0e28d02e3f.jpg',
                'description' => 'A chicken is very soft but not healthy',
                'category_id' => 8,
                'created_at' => '2023-01-25 03:04:29',
                'updated_at' => '2023-01-25 04:14:53',
            ],
            [
                'id' => 6,
                'name' => 'ham burger',
                'price' => '5.00',
                'image' => '0125202308255463d0e792d25cd.jpg',
                'description' => 'Chicken lovers item Burger a piece of chicken',
                'category_id' => 5,
                'created_at' => '2023-01-25 03:25:54',
                'updated_at' => '2023-01-25 03:25:54',
            ],
            [
                'id' => 7,
                'name' => 'Coffee',
                'price' => '2.00',
                'image' => '0126202309165863d2450a8a010.jpg',
                'description' => 'A brown Cofee yahoo',
                'category_id' => 9,
                'created_at' => '2023-01-26 04:16:58',
                'updated_at' => '2023-01-26 04:16:58',
            ],
        ], ['id'], [
            'name',
            'price',
            'image',
            'description',
            'category_id',
            'created_at',
            'updated_at',
        ]);
    }
}
