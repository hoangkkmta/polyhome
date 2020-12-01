<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{

    use SoftDeletes;

    protected $table = 'orders';

    protected $fillable = [
        'host_id',
        'customer_name',
        'customer_phone_number',
        'customer_email',
        'total_price',
        'date_view_room',
        'note',
    ];


}
