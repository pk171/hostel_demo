<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Guest;
use App\Reservation;

class ReservationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $guests = Guest::All();

        for($i = 1; $i <= 20 ; $i++)
        {
            $guest = $guests->random();
            $startDate = $faker->dateTimeBetween("now", "+12 days");
            $endDate = $faker->dateTimeBetween($startDate, "+ 1 month");
            $reservation = new Reservation();
            $reservation->date_in = $startDate;
            $reservation->date_out = $endDate;
            $reservation->made_by = "Faker";
            $reservation->guest_id = $guest->id;
            $reservation->save();
        }

    }
}
