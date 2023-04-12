<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = [
            ['name' => 'Đỏ'],
            ['name' => 'Trắng'],
            ['name' => 'Xanh'],
            ['name' => 'Vàng'],
            ['name' => 'Cam'],
            ['name' => 'Hồng'],
        ];

        DB::table('colors')->insert($colors);
    }
}
