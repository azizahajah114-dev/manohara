<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //create an admin user
        // \App\Models\User::create([
        //     'name' => 'admin',
        //     'email' => 'zizi@gmail.com',
        //     'password' => Hash::make('password'),
        // ]);

        User::create([
            'name' => 'zizah',
            'email' => 'zizah@gmail.com',
            'no_telp' => '082329453188',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);
    }
}
