<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TryCatch extends Model
{
    protected $table = 'try_catch';

    protected $fillable = [
        'visitor_id',
        'user_id',
        'portal',
        'module',
        'function_name',
        'error_message',
        'request',
        'parameter',
        'remarks',
    ];
}
