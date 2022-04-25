<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Endpoint extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'endpoint';

    protected $fillable = [
        'name',
        'url',
        'type',
        'description',
        'header_endpoint',
        'parameters',
        'areas'
    ];



    use HasFactory;





}
