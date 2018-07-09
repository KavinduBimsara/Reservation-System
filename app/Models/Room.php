<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Room extends Model
{
    use Sluggable, SluggableScopeHelpers;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $fillable = ['room_no', 'name', 'description', 'slug', 'room_type_id'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    /*
   |--------------------------------------------------------------------------
   | RELATIONSHIPS
   |--------------------------------------------------------------------------
   */

    public function amenity()
    {
        return $this->belongsToMany(Amenity::class, 'amenity_room')->withTimestamps();
    }

    public function roomType()
    {
        return $this->belongsTo(RoomType::class, 'room_type_id');
    }

    public function reservations()
    {
        return $this->belongsToMany(Reservation::class, 'reservation_number', 'room_id', 'reservation_number')->withTimestamps();
    }
}
