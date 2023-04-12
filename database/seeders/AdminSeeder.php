<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'email' => 'admin@domain.com',
            'password' => Hash::make('123456xX@'),
            'name' => 'Admin',
        ];

        Schema::disableForeignKeyConstraints();
        Admin::query()->truncate();
        Schema::enableForeignKeyConstraints();

        Admin::query()->create($data);
    }
}
