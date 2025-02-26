<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = [
            [
                'firstname' => 'John',
                'lastname' => 'Doe',
                'gender' => 'male',
                'address' => '123 Main St, NY',
                'dob' => '1990-05-15',
                'dept_id' => 1,
                'status' => 'emp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'firstname' => 'Jane',
                'lastname' => 'Smith',
                'gender' => 'female',
                'address' => '456 Elm St, CA',
                'dob' => '1988-11-22',
                'dept_id' => 2,
                'status' => 'cont',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'firstname' => 'Michael',
                'lastname' => 'Johnson',
                'gender' => 'male',
                'address' => '789 Oak St, TX',
                'dob' => '1992-07-09',
                'dept_id' => 3,
                'status' => 'not_act',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'firstname' => 'Emily',
                'lastname' => 'Davis',
                'gender' => 'female',
                'address' => '101 Pine St, FL',
                'dob' => '1995-03-14',
                'dept_id' => 4,
                'status' => 'emp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'firstname' => 'David',
                'lastname' => 'Wilson',
                'gender' => 'male',
                'address' => '222 Maple St, WA',
                'dob' => '1987-09-30',
                'dept_id' => 5,
                'status' => 'cont',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'firstname' => 'Sarah',
                'lastname' => 'Brown',
                'gender' => 'female',
                'address' => '333 Birch St, IL',
                'dob' => '1993-12-05',
                'dept_id' => 6,
                'status' => 'not_act',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'firstname' => 'James',
                'lastname' => 'Anderson',
                'gender' => 'male',
                'address' => '444 Cedar St, NV',
                'dob' => '1990-06-18',
                'dept_id' => 7,
                'status' => 'emp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'firstname' => 'Olivia',
                'lastname' => 'Martinez',
                'gender' => 'female',
                'address' => '555 Spruce St, CO',
                'dob' => '1996-08-25',
                'dept_id' => 8,
                'status' => 'cont',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'firstname' => 'Daniel',
                'lastname' => 'Taylor',
                'gender' => 'male',
                'address' => '666 Palm St, AZ',
                'dob' => '1989-04-12',
                'dept_id' => 9,
                'status' => 'not_act',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'firstname' => 'Sophia',
                'lastname' => 'Harris',
                'gender' => 'female',
                'address' => '777 Willow St, OR',
                'dob' => '1994-02-20',
                'dept_id' => 1,
                'status' => 'emp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('employees')->insert($employees);
    }
}
