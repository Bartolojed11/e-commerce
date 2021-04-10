<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;

class Barangay extends Model
{
    use HasFactory;

    /**
     * Update name of primary key
     *
     * @var string
     */

    protected $primaryKey = 'barangay_id';

    // Temporary
    protected $guarded = [];
    
    /**
     * Get the city that owns the Barangay
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city() 
    {
        return $this->belongsTo(City::class, 'city_id', 'city_id');
    }

    public function orderShipping()
    {
        return $this->belongsTo(orderShipping::class, 'barangay_id', 'osa_id');
    }
}
