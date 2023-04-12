<?php

namespace Database\Seeders\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colors')->insert([
            'name' => 'Red'
        ]);
        DB::table('colors')->insert([
            'name' => 'Yellow'
        ]);
        DB::table('colors')->insert([
            'name' => 'Orange'
        ]);
        DB::table('colors')->insert([
            'name' => 'Cyan'
        ]);
        DB::table('colors')->insert([
            'name' => 'Green'
        ]);
    }
}
