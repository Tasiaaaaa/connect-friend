<?php

namespace Database\Seeders;

use App\Models\FriendRequest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class FriendRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create('en_EN');

        for ($i=0; $i < 20; $i++) { 
            FriendRequest::create([
                'sender_id' => $faker->numberBetween(1,20),
                'receiver_id' => $faker->numberBetween(1,20)
            ]);
        }
    }
}
