<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Amenity extends Model
{
    use SoftDeletes, Sluggable, SluggableScopeHelpers;
    protected $fillable = ['name', 'description'];

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

    public function room()
    {
        return $this->belongsToMany(Room::class, 'amenity_room')->withTimestamps();
    }
}
