<?php

namespace App\Models\Checkout;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'method',
        'qtyorid',
        'sprice',
        'eprice',
        'is_consistent',
        'expirydate'
    ];
}
