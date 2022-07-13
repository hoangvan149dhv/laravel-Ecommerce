<?php

namespace App\Models;


class City extends AbstractModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function province()
    {
        return $this->hasMany(Province::class);
    }
}
