<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'city_id',
    ];

    public function ward()
    {
        return $this->hasMany(Ward::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
