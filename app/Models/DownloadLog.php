<?php

namespace App\Models;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DownloadLog extends Model
{
     protected $table = 'download_log';
     
    protected $fillable = [
        'user_id',
        'visitor_id',
        'document',
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function visitor(): HasOne
    {
        return $this->hasOne(Visitor::class);
    }
}