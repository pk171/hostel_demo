<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Guest;
use App\Reservation;
use App\Room;

class RoomTableSeeder extends Seeder
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
            $room = new Room();
            $room->number = $i;
            $room->capacity = $faker->biasedNumberBetween($min = 1, $max = 4, $function = 'sqrt');
            $room->room_type_id = $faker->biasedNumberBetween($min = 1, $max = 3, $function = 'sqrt');
            $room->save();
        }

    }
}
