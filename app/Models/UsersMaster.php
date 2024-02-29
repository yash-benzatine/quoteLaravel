<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersMaster extends Model
{
    use HasFactory;

    protected $table = 'users_master';

    protected $fillable = [
        'email',
        'username',
        'social_id',
        'device_type',
        'login_type',
    ];
}
