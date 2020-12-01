<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class District extends Model
{

    use SoftDeletes;

    protected $table = 'districts';

    protected $fillable = [
        'name',
        'slug',
    ];

    public function building()
    {
        return $this->hasMany(Building::class, 'district_id');
    }

}
