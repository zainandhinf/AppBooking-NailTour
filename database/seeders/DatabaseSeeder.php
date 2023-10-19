<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        User::create([
            'username' => 'zainandhi',
            'name' => 'Zainandhi',
            'email' => 'zainandhi@gmail.com',
            'password' => bcrypt('111'),
            'role' => 'admin'
        ]);

        User::create([
            'username' => 'fath',
            'name' => 'Fathurrohman',
            'email' => 'fathurrohman@gmail.com',
            'password' => bcrypt('111'),
            'role' => 'user'
        ]);
    }
}