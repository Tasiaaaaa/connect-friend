<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('en_EN');

        $hobbies = [
            'Reading',
            'Traveling',
            'Gardening',
            'Gaming',
            'Coding',
            'Dancing',
        ];

        for ($i=0; $i < 20; $i++) { 
            $randomHobbies = array_rand(array_flip($hobbies), 3);
            $selectedHobbies = implode(',', $randomHobbies);

            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make('123456789'),
                'gender' => $faker->randomElement($array = ['Male', 'Female']),
                'hobbies' => $selectedHobbies,
                'mobile_number' => $faker->phoneNumber(),
                'has_paid' => 1,
                'register_price' => rand(100000, 125000),
                'profile_path' => 'profile_dummy/'.$faker->numberBetween(1,3).'.jpg'
            ]);
        }
    }
}
