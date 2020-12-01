<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Customer\Notifications\ResetPasswordToken;

class Customer extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $table = 'customers';

    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'avatar',
        'birthday',
        'phone',
        'address',
        'ward_id',
        'status',
        'registration_token',
        'send_email_at',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = [
        'deleted_at'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordToken($token, $this->email, $this->name));
    }

}
