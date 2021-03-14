<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;
use App\Models\Status;
use App\Models\OrderShippingAddress;

class Order extends Model
{
    use HasFactory;

    // Temporary
    protected $guarded = [];

    /**
     * Update name of primary key
     *
     * @var string
     */

    protected $primaryKey = 'order_id';

    /**
     * Get all of the ordered items for the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items() 
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'order_id');
    }

    /**
     * Get the status associated with the Admin
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function status() 
    {
        return $this->hasOne(Status::class, 'status_id', 'status_id');
    }

    /**
     * Get the shipping address associated with the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function shippingAddress() 
    {
        return $this->hasOne(OrderShippingAddress::class, 'order_id', 'order_id');
    }
}
