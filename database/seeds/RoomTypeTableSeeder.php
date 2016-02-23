<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\RoomType;

class RoomTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i = 1; $i <= 3; $i++)
        {
           $roomType = new RoomType();
           switch ($i) {
               case '1':
                   $roomType->name = "duzy";
                   break;
               case '2':
                   $roomType->name = "sredni";
                   break;
               case '3': 
                   $roomType->name = "maly";
                   break;
           }
           $roomType->save();
        }

    }
}
