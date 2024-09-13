<?php

namespace App\Models\Rss;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    use HasFactory;

    protected $fillable = [
        'rss_id',
        'xml',
        'expirydate'
    ];

    protected $dates = ['created_at', 'updated_at', 'expirydate'];
}