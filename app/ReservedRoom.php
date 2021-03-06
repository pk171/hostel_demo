<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class ReservedRoom extends Model 
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'reserved_room';

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
}
