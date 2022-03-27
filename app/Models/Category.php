<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Category extends Model
{
    protected $connection = 'mongodb';
    protected $table = 'category';

    use HasFactory;
    protected $fillable = [
        'name', 'order','description',
    ];


}
