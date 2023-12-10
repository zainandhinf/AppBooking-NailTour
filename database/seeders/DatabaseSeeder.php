<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Provinces;
use App\Models\City;
use App\Models\Country;
use App\Models\Transportation;
use App\Models\Payment;

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
            'role' => 'admin',
            'no_phone' => null,
            'photo_profile' => 'photoprofile/user.png'
        ]);

        User::create([
            'username' => 'fath',
            'name' => 'Fathurrohman',
            'email' => 'fathurrohman@gmail.com',
            'password' => bcrypt('111'),
            'role' => 'user',
            'no_phone' => null,
            'photo_profile' => 'photoprofile/user.png'
        ]);

        User::create([
            'username' => 'zain',
            'name' => 'Zainandhi',
            'email' => 'zain@gmail.com',
            'password' => bcrypt('111'),
            'role' => 'officer',
            'no_phone' => null,
            'photo_profile' => 'photoprofile/user.png'
        ]);

        Provinces::create([
            'name' => 'Jawa Barat'
        ]);
        Provinces::create([
            'name' => 'Jawa Tengah'
        ]);
        Provinces::create([
            'name' => 'Jawa Timur'
        ]);
        Provinces::create([
            'name' => 'Banten'
        ]);

        City::create([
            'name' => 'Kota Bandung',
            'provinces_id' => '1'
        ]);
        City::create([
            'name' => 'Kota Semarang',
            'provinces_id' => '2'
        ]);
        City::create([
            'name' => 'Kota Surabaya',
            'provinces_id' => '3'
        ]);
        City::create([
            'name' => 'Kabupaten Tangerang',
            'provinces_id' => '4'
        ]);

        Country::create([
            'name' => 'Thailand'
        ]);
        Country::create([
            'name' => 'Malaysia'
        ]);
        Country::create([
            'name' => 'Singapore'
        ]);

        Transportation::create([
            'name' => 'Private Car'
        ]);
        Transportation::create([
            'name' => 'Bus'
        ]);
        Transportation::create([
            'name' => 'Train'
        ]);

        Payment::create([
            'name' => 'BNI',
            'description' => 'Transfer ke nomor rekening 239298331923'
        ]);
        Payment::create([
            'name' => 'BRI',
            'description' => 'Transfer ke nomor rekening 783734382934'
        ]);
    }
}