<?php

namespace Database\Seeders;

use App\Models\Friend;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class FriendSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create('en_EN');

        for ($i=0; $i < 20; $i++) { 
            Friend::create([
                'user_id' => $faker->numberBetween(1,20),
                'friend_id' => $faker->numberBetween(1,20)
            ]);
        }
    }
}
