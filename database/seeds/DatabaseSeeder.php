<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\seeds\GuestTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);
        $this->call('GuestTableSeeder');
        $this->call('ReservationTableSeeder');
        $this->call('RoomTypeTableSeeder');
        $this->call('RoomTableSeeder');
        $this->call('ReservedRoomTableSeeder');
        Model::reguard();
    }
}
