<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Users extends Authenticatable
{
    protected $table = "users";
    protected $fillable = ['name', 'email', 'password'];
}
