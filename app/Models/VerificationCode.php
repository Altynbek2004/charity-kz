<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class VerificationCode extends Authenticatable
{

    use HasFactory, Notifiable, HasRoles;
    protected $fillable = ['email', 'password', 'code', 'expires_at'];

    protected $casts = [
        'expires_at' => 'datetime',
    ];

    public function isExpired()
    {
        return $this->expires_at->isPast();
    }



}
