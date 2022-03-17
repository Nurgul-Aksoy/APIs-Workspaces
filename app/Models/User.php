<?php

namespace App\Models;

use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends \Jenssegers\Mongodb\Auth\User {
    use Notifiable, HasApiTokens, CanResetPassword;
}
