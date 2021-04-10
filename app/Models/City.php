<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Province;
use App\Models\Barangay;

class City extends Model
{
    use HasFactory;

    /**
     * Update name of primary key
     *
     * @var string
     */

    protected $primaryKey = 'city_id';

    protected $table = 'cities';

    // Temporary
    protected $guarded = [];

    /**
     * Get the province that owns the City
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function province() 
    {
        return $this->belongsTo(Province::class, 'province_id', 'province_id');
    }

    /**
     * Get all of the barangay for the City
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function barangay() 
    {
        return $this->hasMany(Barangay::class, 'city_id', 'city_id');
    }

    public function orderShipping()
    {
        return $this->belongsTo(orderShipping::class, 'city_id', 'osa_id');
    }
}
