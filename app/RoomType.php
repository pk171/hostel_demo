<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model 
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'room_type';
    
    public $timestamps = false;

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

    public function rooms()
    {
        return $this->hasMany('App\Room', 'room_type_id', 'id');
    }
}
