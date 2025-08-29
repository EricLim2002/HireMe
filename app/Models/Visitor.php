<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable = [
        'ip',
        'country',
        'city',
        'state',
        'timezone',
        'user_agent',
    ];
    
}
