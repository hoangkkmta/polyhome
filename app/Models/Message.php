<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{

    use SoftDeletes;

    protected $table = 'messages';

    protected $fillable = [
        'customer_id',
        'host_id',
        'message',
        'message_type',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function host()
    {
        return $this->belongsTo(Host::class, 'host_id', 'id');
    }
}
