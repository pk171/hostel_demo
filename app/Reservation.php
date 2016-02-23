<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'reservation';

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
    
    public function rooms(){
        return $this->belongsToMany('App\Room', 'reserved_room', 'reservation_id', 'room_id');
    }
}
