<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Product;

class OrderItem extends Model
{
    use HasFactory;

    /**
     * Update name of primary key
     *
     * @var string
     */

    protected $primaryKey = 'order_item_id';

    // Temporary
    protected $guarded = [];

    protected $with = ['product'];

    /**
     * Get the order that owns the OrderItem
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order() 
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }

    /**
     * Get the product that owns the OrderItem
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product() 
    {
        return $this->hasOne(Product::class, 'product_id', 'product_id');
    }
}
