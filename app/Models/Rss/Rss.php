<?php

namespace App\Models\Rss;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rss extends Model
{
    use HasFactory;

    protected $fillable = [
        'subscribed',
    ];
}
