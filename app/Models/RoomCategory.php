<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoomCategory extends Model
{

    use SoftDeletes;

    protected $table = 'room_categories';

    protected $fillable = [
        'name'
    ];
}
