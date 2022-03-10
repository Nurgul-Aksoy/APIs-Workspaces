<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class AdminModel extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'user'; //?


    protected $fillable = [
        'name','surname','username', 'password'
    ];
}
