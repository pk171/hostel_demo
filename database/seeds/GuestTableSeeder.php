<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Guest;

class GuestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i = 1; $i <= 20 ; $i++)
        {   
            $guest = new Guest;
            $guest->firstName = $faker->firstName;
            $guest->lastName = $faker->lastName;
            $guest->member_since = $faker->date($format = 'Y-m-d', $max = 'now');
            $guest->save();
        }
        
    }
}
