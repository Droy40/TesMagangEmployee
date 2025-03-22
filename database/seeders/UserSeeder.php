<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'AdminUser',
                'email' => 'test1@example.com',
                'password' => bcrypt('123'),
                'role'=>'admin'
            ],
            [
                'name' => 'GuestUser',
                'email' => 'test2@example.com',
                'password' => bcrypt('123'),
                'role'=>'guest'
            ]
        ]);
    }
}
