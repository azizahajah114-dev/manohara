<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        //bikin 10 user dumy
        foreach (range(1, 10) as $index) {
            User::create([
                'name' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'password' => Hash::make('password123'), // default password sama
                'no_telp' => $faker->phoneNumber(),
                'up_ktp' => null, // bisa faker->imageUrl() kalau mau dummy gambar
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        //bikin 1 admin 
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'),
            'no_telp' => $faker->phoneNumber(),
            'up_ktp' => null, // bisa faker->imageUrl() kalau mau dummy gambar
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
