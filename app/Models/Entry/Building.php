<?php

namespace App\Models\Entry;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;

    protected $fillable = [
        'building_name',
        'country_id',
    ];

    public function country()
    {
        return $this->hasOne(Country::class);
    }
}
