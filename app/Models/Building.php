<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Building extends Model
{

    use SoftDeletes;

    protected $table = 'buildings';

    protected $fillable = [
        'host_id',
        'name',
        'slug',
        'image',
        'price',
        'electricity_price',
        'water_price',
        'internet_price',
        'cleaning_price',
        'elevator_price',
        'parking_price',
        'description',
        'video',
        'rating',
        'view',
        'district_id',
        'address',
        'google_map',
        'utility_id',
        'school_id',
        'status',
        'active',
        'rank',
    ];

    public function district(){
        return $this->belongsTo(District::class, 'district_id', 'id');
    }

    public function room()
    {
        return $this->hasMany(Room::class, 'building_id');
    }

}
