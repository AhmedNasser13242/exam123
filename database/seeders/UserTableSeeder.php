<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Admin

        DB::table('users')->insert([
            [
                'name' => 'Use',
                'username' => 'admin',
                'email' => 'Admin@gmail.com',
                'password' => Hash::make('111'),
                'role' => 'admin',
                'status' => 'active',
            ],
            [
                'name' => 'Ahmed Vendor',
                'username' => 'vendor',
                'email' => 'Vendor@gmail.com',
                'password' => Hash::make('111'),
                'role' => 'vendor',
                'status' => 'active',
            ],
            [
                'name' => 'User',
                'username' => 'user',
                'email' => 'User@gmail.com',
                'password' => Hash::make('111'),
                'role' => 'user',
                'status' => 'active',
            ],
        ]);
    }
}
