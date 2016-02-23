<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RoomType;
use App\Room;
use DB;
use App\Reservation;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($startDate, $endDate)
    {
        $roomAvability = array();
        $roomList = Room::all();
        foreach ($roomList as $room) {
            $roomReservation = DB::table('room')->join('reserved_room', 'room.id', '=', 'reserved_room.room_id')
                ->join('reservation', 'reserved_room.reservation_id', '=', 'reservation.id')
                ->where('room.id', $room->id)->get();
            $currentRoom = array();
            $tempSDate = $startDate;
            while (strtotime($tempSDate) <= strtotime($endDate)) {
                $dayReserved = false;
                foreach ($roomReservation as $ar) {
                    $date_in = strtotime(date('Y-m-d', strtotime($ar->date_in)));
                    if ((strtotime($tempSDate) >= $date_in) && (strtotime($tempSDate) <= strtotime($ar->date_out))) {
                        $temp = clone $ar;
                         $temp->resDay = $this->dayOfReservation($tempSDate, $ar->date_in, $ar->date_out);
                        array_push($currentRoom, $temp);
                        $dayReserved = true;
                        break;
                    }
                }
                if (!$dayReserved) {
                    array_push($currentRoom, 0);
                }
                $tempSDate = date('Y-m-d', strtotime('+1 day', strtotime($tempSDate)));
            }
            array_unshift($currentRoom, $room->number);
            array_push($roomAvability, $currentRoom);
        }

        return response()->json($roomAvability);
    }
    
     //F - first day, M - middle day, L - last day of reservation
    private function dayOfReservation($currentDay, $firstDay, $lastDay){
        $f = strtotime(date('Y-m-d', strtotime($firstDay)));
        $l = strtotime(date('Y-m-d', strtotime($lastDay)));
        $c = strtotime(date('Y-m-d', strtotime($currentDay)));
        if($f == $l)
            return "FL";
        if($c == $f)
            return "F";
        if($c == $l)
            return "L";
        return "M";
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $room = new Room();
        $room->number = $request->number;
        $room->capacity = $request->capacity;
        $room->room_type_id = $request->roomType;
        $room->save();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function getAll()
    {
        return Room::All();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guest = Guest::find($id);
        $guest->delete();
    }
}
