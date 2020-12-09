<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{

    use SoftDeletes;

    protected $table = 'rooms';

    protected $fillable = [
        'host_id',
        'building_id',
        'name',
        'price',
        'room_category_id',
        'utility_id',
        'acreage',
        'max_people',
        'floors',
        'date_start',
        'date_end',
        'status',
        'active',
    ];

    public function building()
    {
        return $this->belongsTo(Building::class, 'building_id', 'id');
    }

    public function order_detail()
    {
        return $this->hasMany(OrderDetail::class, 'room_id');
    }

    public function room_category()
    {
        return $this->belongsTo(RoomCategory::class, 'room_category_id', 'id');
    }

}
