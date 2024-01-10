<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(
            [
                'fullname' => 'John Doe',
                'email' => 'john@gmail.com',
                'password' => bcrypt('12345678'),
            ]
        );

        User::create(
            [
                'fullname' => 'Abraham',
                'email' => 'abraham@gmail.com',
                'password' => bcrypt('12345678'),
            ]
        );

        User::create(
            [
                'fullname' => 'Mark',
                'email' => 'mark@gmail.com',
                'password' => bcrypt('12345678'),
            ]
        );
    }
}
