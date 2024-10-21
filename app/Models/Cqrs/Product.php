<?php

namespace App\Models\Cqrs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'cqrs_products';

    protected $fillable = [
        'name',
        'price',
    ];
}