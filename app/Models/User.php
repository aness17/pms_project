<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 't_users';
    protected $primaryKey = 'id_user';
    public $timestamps = false;

    protected $fillable = [
        'username',
        'email',
        'password',
        'is_blocked',
        'is_login',
        'last_login_date'
    ];

    protected $hidden = ['password'];
}
