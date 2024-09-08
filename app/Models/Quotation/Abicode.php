<?php

namespace App\Models\Quotation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abicode extends Model
{
    use HasFactory;

    protected $fillable = ['abi_code','rating_factor'];
}