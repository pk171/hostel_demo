<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Guest;
use App\Reservation;
use App\ReservedRoom;
use App\Room;

class ReservedRoomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $reservations = Reservation::all();
        $room = DB::table('room')->min('id');
        foreach ($reservations as $reservation) {
            $reservedRoom = new ReservedRoom();
            $reservedRoom->reservation_id = $reservation->id;
            $reservedRoom->room_id = $room;
            $reservedRoom->save();
            $room = Room::where('id', '>', $room)->min('id');

        }
    }
}
