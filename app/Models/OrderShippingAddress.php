<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\City;
use App\Models\Barangay;
use App\Models\Province;

class OrderShippingAddress extends Model
{
    use HasFactory;

    /**
     * Update name of primary key
     *
     * @var string
     */

    protected $primaryKey = 'osa_id';

    // Temporary
    protected $guarded = [];

    protected $with = ['city', 'province', 'brgy'];

    /**
     * Get the order that owns the OrderShippingAddress
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order() 
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }

    public function city()
    {
        return $this->hasOne(City::class, 'city_id', 'city_id');
    }

    public function province()
    {
        return $this->hasOne(Province::class, 'province_id', 'province_id');
    }

    public function brgy()
    {
        return $this->hasOne(Barangay::class, 'barangay_id', 'brgy_id');
    }
}
