<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'phone',
        'customer',
        'products',
        'status',
    ];

    protected $casts = [
        'customer' => 'array',
        'products' => 'array',
    ];

    public function location() {
       return getLocationByWard($this->customer['location']['ward']);
    }
}
