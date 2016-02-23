<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Room extends Model 
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'room';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public $timestamps = false;
    
    public function reservations (){
        return $this->belongsToMany('App\Reservation', 'reserved_room', 'room_id', 'reservation_id');
    }
}
