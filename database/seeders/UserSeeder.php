<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'AdminUser',
            'email' => 'test1@example.com',
            'password' => bcrypt('123'),
            'role'=>'admin'
        ]);
        User::factory()->create([
            'name' => 'GuestUser',
            'email' => 'test2@example.com',
            'password' => bcrypt('123'),
            'role'=>'guest'
        ]);
    }
}
