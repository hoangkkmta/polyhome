<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class School extends Model
{

    use SoftDeletes;

    protected $table = 'schools';

    protected $fillable = [
        'name',
        'slug',
    ];

    public function building()
    {
        return $this->hasMany(Building::class, 'school_id');
    }
}
